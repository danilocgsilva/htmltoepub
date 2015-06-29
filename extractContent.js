function extractContent() {
	var ret_code = 1;
	
	macro = "";
	macro += "CODE:" + "\n";
	macro += "SET !EXTRACT_TEST_POPUP NO" + "\n";
	macro += "URL GOTO=http://blogdosakamoto.blogosfera.uol.com.br/2015/06/28/como-sera-o-dia-seguinte-a-reducao-da-maioridade-penal/" + "\n";
	macro += "TAG POS=1 TYPE=DIV ATTR=ID:texto EXTRACT=HTM" + "\n";
	macro += "SAVEAS TYPE=EXTRACT FOLDER=C:\\Users\\danil_000\\Documents\\iMacros\\Downloads FILE=dados3.TXT" + "\n";
	
	ret_code = iimPlay(macro);
}