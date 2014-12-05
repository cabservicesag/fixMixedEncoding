fixMixedEncoding
================

Sometime you have a mixed up encoding file which contains both correct and damaged utf-8. This could help.

Usage: > php fix_mixed_encoding.php inputfile.sql outputfile.sql

If you run into memory problems:

php -d memory_limit=2000M inputfile.sql outpufile.sql
