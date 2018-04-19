# Online TimeTable Generator

Timbal is a personnal project, the last one of a 7 months studying at OpenClassrooms
(https://openclassrooms.com/paths/developpeur-web-junior).

The idea is to provide a quick and easy way to generate and print a personal timetable.

At university, and more generally when you begin a new student year, you first have to organize your future weeks,
collecting all your courses details from annoying listings in order to create your timetable...

Timbal was created to achieve this last point as fast as possible.

Timbal's intructions:
- Create your account
- Add all your courses
- See your personal Timbal on the left panel
- Print it
- It's done !

The project is built in PHP, Symfony3. Some Jquery. And the main page system is built in Javascript.

Why Timbal ?
Timbal is a kind of blended word formed from two words : time/table
Timbal is also a drum instrument. You probably know that percussions set tempo and rhythm of all kind of music,
and in a way timbal sets tempo of the day :)
Lastly, Timbal was built with Symfony...so let's stay in music's lexical field and be a part of a bigger orchestra !

// NOTE
To use the "Save in pdf" option:
You need to install an executable locally, or on your web hosting server
- I use KnpSnappyBundle based on wkhtmltopdf. See KNPSnappy docs & download the file at https://wkhtmltopdf.org/downloads.html
- With shared web hosting you need to look at your plan details, because things have to be installed on it, it's higly recommended to use SSH.
- In all the cases the "Print" option allows you to convert a print view into a pdf file, from your web browser print options...
