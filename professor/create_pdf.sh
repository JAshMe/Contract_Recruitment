#!/bin/sh

id=$1
doc1="$id.DOCX"
doc2="$id_2.DOCX"
pdf1="$id.pdf"
pdf2="$id_2.pdf"
img1="$id.jpeg"
img2="$id_2.jpeg"

soffice --headless --convert-to pdf CreditSheets/${doc1} --outdir CreditSheets/
