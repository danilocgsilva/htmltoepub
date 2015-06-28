var i, retcode;
var report;
var macrolist = new Array();

macrolist.push("Demo-Firefox/Extract.iim");
macrolist.push("Demo-Firefox/Download.iim");

report  =  "Self-Test Report\n\n";

for (i = 0; i < macrolist.length; i++) {
    iimDisplay("Step "+(i+1)+" of "+macrolist.length + "\nMacro: "+macrolist[i]);
    retcode = iimPlay(macrolist[i]);
    report += macrolist[i];
    if (retcode < 0) {
        report += ": "+iimGetLastError();
    } else {
        report += ": OK";
        
        s = iimGetLastExtract(1);
        if ( s != "" )  report += ", Extract: "+s;
    }
    report += "\n";
}

alert ( report );


