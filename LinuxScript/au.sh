#!/bin/bash
#date  2014-01-15
#author Regend

libdir="/src"

if [[ ! -d $1 ]];then
    publib $1
	
	cd $libdir/$1
	file_name_s=''
 for i in `ls -tr`;
do
 echo $i;
 file_name_s=$i;
	
	cd /app/$1
	rm -rf web.bak
	cp -r web web.bak
	cd web 
		
done;

    cp -r $libdir/$1/$file_name_s ./
	unzip -o $file_name_s
	rm -rf $file_name_s
	
fi