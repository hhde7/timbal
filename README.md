# Online TimeTable Generator

Timbal is a personnal project, the last one of 7 months studying at OpenClassrooms.

The idea is to provide a quick and easy way to generate and print a time table.
At university and more generally when your studies start, you have to organize your future weeks,
after collecting all your courses details from annoying listings...

Timbal's intructions:
- Create an account
- Fill the clock data (Day, Start time, Duration, Subject, Room ~ Building ~ Teacher)
- Add the course to your Timbal
- See your personal Timbal on the left panel (click on the upper left corner button to make it appear)
- Then, add all your courses...
- You can remove a single course or delete all of them at your convenience
- Finally print it, from the top menu above your personal Timbal

Tips:
If your are using the "Save in pdf" option, you need to install an executable locally or on your server to make it works
- The symfony bundle used is KnpSnappyBundle. See docs.
- On shared server, see your provider details, you need to install things on it, so ...SSH seems required.
- In all the cases the "Print" option allows you to convert a print view to a pdf file according to your browser options...

The project is built in PHP, Symfony3. Some Jquery. And all front visual components are built in Javascript.
