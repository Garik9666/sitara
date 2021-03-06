<?
$MESS["VULNSCAN_CODE_HELP"] = "Um ataque pode injetar e executar código PHP arbitrário. Leia mais: <a href=\"http://cwe.mitre.org/data/definitions/78.html\">http://cwe.mitre.org/data/definitions/78.html</a>";
$MESS["VULNSCAN_CODE_HELP_SAFE"] = "Filtrar entrada do usuário usando <b>EscapePHPString</b>.";
$MESS["VULNSCAN_CODE_NAME"] = "Execução de código arbitrário";
$MESS["VULNSCAN_DATABASE_HELP"] = "Um ataque pode injetar comandos SQL arbitrários para a consulta, o que é extremamente perigoso. É recomendado que você filtre os dados do usuário antes de realmente enviá-los para o servidor. Leia mais: <ahref=\"https://www.owasp.org/index.php/SQL_Injection\">https://www.owasp.org/index.php/SQL_Injection</a>";
$MESS["VULNSCAN_DATABASE_HELP_SAFE"] = "Usar conversões de tipo explícitas para dados numéricos (int, float, etc.) Use mysql_escape_string, \$ DB-> ForSQL () e rotinas semelhantes para dados de seqüência. Controle do comprimento de dados.";
$MESS["VULNSCAN_DATABASE_NAME"] = "SQL Injection";
$MESS["VULNSCAN_DYNAMIC_FUNCTION"] = "Chamada de função dinâmica!";
$MESS["VULNSCAN_EXEC_HELP"] = "Um ataque pode injetar e executar código ou comandos arbitrários. É extremamente perigoso. Leia mais: <a href=\"https://www.owasp.org/index.php/Code_Injection\">https://www.owasp.org/index.php/Code_Injection</a>";
$MESS["VULNSCAN_EXEC_HELP_SAFE"] = "Verificar se os valores das variáveis são válidos e no intervalo permitido. Por exemplo, você pode querer rejeitar caracteres nacionais e de pontuação. A faixa permitida é definida pelos requisitos do projeto. Use e escapeshellcmd e escapeshellarg por segurança.";
$MESS["VULNSCAN_EXEC_NAME"] = "Execução de comandos arbitrários";
$MESS["VULNSCAN_EXTRACT"] = "Variáveis previamente inicializados podem ser substituídas!";
$MESS["VULNSCAN_FILE"] = "Arquivo";
$MESS["VULNSCAN_FIULECHECKED"] = "Arquivos verificados:";
$MESS["VULNSCAN_HEADER_HELP"] = "Um ataque pode usar resposta HTTP injeção de cabeçalho para executar o redirecionamento ou inserir o código HTML/JS malicioso. Recomenda-se filtrar as novas linhas antes da saída para o header de resposta. Real para PHP anteriores ao 5.4. Leia mais: <a href=\"http://www.infosecwriters.com/text_resources/pdf/HTTP_Response.pdf\">http://www.infosecwriters.com/text_resources/pdf/HTTP_Response.pdf</a>";
$MESS["VULNSCAN_HEADER_HELP_SAFE"] = "Novas linhas são recomendadas a serem filtradas antes de adicionar texto para o cabeçalho.";
$MESS["VULNSCAN_HEADER_NAME"] = "Divisão de resposta HTTP";
$MESS["VULNSCAN_HELP_FUNCTION"] = "Função/Método";
$MESS["VULNSCAN_HELP_INPUT"] = "Fonte";
$MESS["VULNSCAN_HELP_SAFE"] = "Esteja Seguro!";
$MESS["VULNSCAN_HELP_VULNTYPE"] = "Tipo de vulnerabilidade";
$MESS["VULNSCAN_INCLUDE_HELP"] = "Um ataque pode montar arquivos locais e/ou remotos, ou ler arquivos do site. É recomendado que você canonicalize caminhos em dados do usuário antes de usá-los. Leia mais: <a href=\"https://rdot.org/forum/showthread.php?t=343\">https://rdot.org/forum/showthread.php?t=343</a>";
$MESS["VULNSCAN_INCLUDE_HELP_SAFE"] = "Normalizar os caminhos antes de usá-los.";
$MESS["VULNSCAN_INCLUDE_NAME"] = "Inclusão de arquivos";
$MESS["VULNSCAN_OTHER_HELP"] = "Nenhuma descrição.";
$MESS["VULNSCAN_OTHER_NAME"] = "Alteração potencial de lógica do sistema";
$MESS["VULNSCAN_POP_HELP"] = "Desserialização de dados do usuário pode tornar-se uma vulnerabilidade séria. Leia mais: <a href=\"https://rdot.org/forum/showthread.php?t=950\">https://rdot.org/forum/showthread.php?t=950</a>";
$MESS["VULNSCAN_POP_NAME"] = "Serialização de dados";
$MESS["VULNSCAN_REQUIRE"] = "Condições necessárias";
$MESS["VULNSCAN_SIMILAR"] = "Semelhante";
$MESS["VULNSCAN_TOKENIZER_NOT_INSTALLED"] = "PHP tokenizer não está habilitado. Ative-o para completar o teste.";
$MESS["VULNSCAN_UNKNOWN"] = "Vulnerabilidade potencial";
$MESS["VULNSCAN_UNKNOWN_HELP"] = "Nenhuma descrição.";
$MESS["VULNSCAN_VULNCOUNTS"] = "Possíveis problemas encontrados:  ";
$MESS["VULNSCAN_XSS_HELP"] = "Um ataque pode executar código HTML/JS malicioso arbitrário no contexto do navegador da vítima. É recomendado que você filtre as variáveis antes da saída para HTML/JS.<br>Leia mais: <a href=\"https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)\">https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)</a>";
$MESS["VULNSCAN_XSS_HELP_SAFE"] = "Usar <b>htmlspecialcharsbx</b>. Atribuição de etiquetas sempre entre aspas duplas. Força o protocolo especificador (http) no href e src atribui valores quando necessário.";
$MESS["VULNSCAN_XSS_NAME"] = "Cross-Site Scripting";
?>