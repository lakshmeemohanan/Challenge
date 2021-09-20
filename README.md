# Challenge
*A tool to import file(JSON, XML, CSV) to database.
*This uses factory pattern to make it easily adjustable to different source data formats (CSV, XML, etc.)
*This uses filter pattern to filter the data based on age(18-65) and that the users's credit card must have three identical numbers in a sequence.
*Also ensures that the process, if terminated would resume from where it is left off without inserting duplicate values into the database.
*Usage: php main.php
