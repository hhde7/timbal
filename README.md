# Online TimeTable Generator

Timbal is a personnal project, the last one of a 7 months studying at OpenClassrooms
(https://openclassrooms.com/paths/developpeur-web-junior).

The idea is to provide a quick and easy way to generate and print a time table.

At university and more generally when your start a year, you have to organize your future weeks,
and collect all your courses details from annoying listings to create your time table...

Timbal allows you to create a landscape timetable as fast as it possible.

Timbal's intructions:
- Create an account
- Fill the clock's data (Day, Start time, Duration, Subject, Room ~ Building ~ Teacher)
- Add all your the courses to your Timbal
- See your personal Timbal on the left panel (click on the upper left corner button to make it appear)
- Print it, from the top menu above your personal Timbal
- It's done !

Tips:
To use the "Save in pdf" option, you need to install an executable locally, or on your web server, to make it works properly
- I use KnpSnappyBundle based on wkhtmltopdf. See docs & download the file at https://wkhtmltopdf.org/downloads.html
- With shared web hosting you need to look at your plan details, but things have to be installed on it, so ...SSH seems required.
- In all the cases the "Print" option allows you to convert a print view to a pdf file according to your browser options...

The project is built in PHP, Symfony3. Some Jquery. And all front visual components are built in Javascript.
