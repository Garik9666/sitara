;(function() {
	'use strict';

	BX.namespace('BX.Grid');


	/**
	 * BX.Grid.PinHeader
	 * @param {BX.Main.grid} parent
	 * @constructor
	 */
	BX.Grid.PinHeader = function(parent)
	{
		this.parent = null;
		this.table = null;
		this.header = null;
		this.container = null;
		this.parentNodeResizeObserver = null;
		this.init(parent);
	};

	BX.Grid.PinHeader.prototype = {
		init: function(parent)
		{
			this.parent = parent;
			this.rect = BX.pos(this.parent.getHead());
			this.gridRect = BX.pos(this.parent.getTable());

			var workArea = BX.Grid.Utils.getBySelector(document, '#workarea-content', true);

			if (!workArea)
			{
				workArea = this.parent.getContainer().parentNode;
				workArea = !!workArea ? workArea.parentNode : workArea;
			}

			if (!!workArea)
			{
				this.parentNodeResizeObserver = new BX.ResizeObserver(BX.proxy(this.refreshRect, this));
				this.parentNodeResizeObserver.observe(workArea);
			}

			this.create(true);

			document.addEventListener('scroll', BX.proxy(this._onScroll, this), BX.Grid.Utils.listenerParams({passive: true}));
			document.addEventListener('resize', BX.proxy(this._onResize, this), BX.Grid.Utils.listenerParams({passive: true}));
			BX.addCustomEvent('Grid::updated', BX.proxy(this._onGridUpdate, this));
			BX.addCustomEvent('Grid::resize', BX.proxy(this._onGridUpdate, this));
			BX.bind(window, 'resize', BX.proxy(this._onGridUpdate, this));
		},

		refreshRect: function()
		{
			this.gridRect = BX.pos(this.parent.getTable());
			this.rect = BX.pos(this.parent.getHead());
		},

		_onGridUpdate: function()
		{
			var isPinned = this.isPinned();

			BX.remove(this.getContainer());
			this.create();

			isPinned && this.pin();

			this.table = null;
			this.refreshRect();

			BX.onCustomEvent(window, 'Grid::headerUpdated', []);
		},

		create: function(async)
		{
			var cells = BX.Grid.Utils.getByTag(this.parent.getHead(), 'th');
			var cloneThead = BX.clone(this.parent.getHead());
			var cloneCells = BX.Grid.Utils.getByTag(cloneThead, 'th');

			var resizeCloneCells = function ()
			{
				cells.forEach(
					function (cell, index)
					{
						var width = BX.width(cell);

						if (index > 0)
						{
							width -= parseInt(BX.style(cell, 'border-left-width'));
							width -= parseInt(BX.style(cell, 'border-right-width'));
						}

						cloneCells[index].firstElementChild && (cloneCells[index].firstElementChild.style.width = width + 'px');

						if (cells.length - 1 > index)
						{
							cloneCells[index].style.width = width + 'px';
						}
					}
				);
			};

			async ? setTimeout(resizeCloneCells, 0) : resizeCloneCells();

			this.container = BX.decl({
				block: 'main-grid-fixed-bar',
				mix: 'main-grid-fixed-top',
				attrs: {
					style: 'width: ' + BX.width(this.parent.getContainer()) + 'px'
				},
				content: {
					block: 'main-grid-table',
					tag: 'table',
					content: cloneThead
				}
			});

			this.container.hidden = true;

			this.parent.getWrapper().appendChild(this.container);
		},

		getContainer: function()
		{
			return this.container;
		},

		getFixedTable: function()
		{
			return this.table || (this.table = BX.Grid.Utils.getByTag(this.getContainer(), 'table', true));
		},

		pin: function()
		{
			!!this.getContainer() && (this.getContainer().hidden = false);
			BX.onCustomEvent(window, 'Grid::headerPinned', []);
		},

		unpin: function()
		{
			!!this.getContainer() && (this.getContainer().hidden = true);
			BX.onCustomEvent(window, 'Grid::headerUnpinned', []);
		},

		stopPin: function()
		{
			BX.Grid.Utils.styleForEach([this.getContainer()], {
				'position': 'absolute',
				'top': ((this.gridRect.bottom - this.rect.height - this.gridRect.top) + 'px'),
				'box-shadow': 'none'
			});
		},

		startPin: function()
		{
			BX.Grid.Utils.styleForEach([this.getContainer()], {
				'position': 'fixed',
				'top': 0,
				'box-shadow': ''
			});
		},

		isPinned: function()
		{
			return !this.getContainer().hidden;
		},

		_onScroll: function()
		{
			var scrollY = 0;

			if (this.scrollRect)
			{
				scrollY = this.scrollRect.scrollTop;
			}
			else
			{
				if (document.scrollingElement)
				{
					this.scrollRect = document.scrollingElement;
				}
				else
				{
					if (document.documentElement.scrollTop > 0)
					{
						this.scrollRect = document.documentElement;
					}
					else if (document.body.scrollTop > 0)
					{
						this.scrollRect = document.body;
					}
				}
			}

			if (this.gridRect.bottom > (scrollY + this.rect.height))
			{
				this.startPin();

				if (this.rect.top <= scrollY)
				{
					!this.isPinned() && this.pin();
				}
				else
				{
					this.isPinned() && this.unpin();
				}
			}
			else
			{
				this.stopPin();
			}
		},

		_onResize: function()
		{
			this.rect = BX.pos(this.parent.getHead());
		}
	}
})();