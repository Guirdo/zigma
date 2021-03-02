var doc = new jsPDF.jsPDF();

doc.text("Hello world!", 10, 10);
doc.save("a4.pdf");