## *Yet Another Site* ##
A simple news/post site
project developed in the Languages and Web Technologies course unit


### Project Infos
* **Date:** 3rd Year - 1st Semester - 2018/2019 (Dec 2018)
* **Topic:** Project
* **Course:** Languages and Web Technologies
* **Course Link:** [link](https://sigarra.up.pt/feup/pt/ucurr_geral.ficha_uc_view?pv_ocorrencia_id=420005)
* **Project done with:** [Ricardo Silva](https://github.com/TejInaco) and Fábio Gaspar(https://github.com/Fabiodrg666)


### Disclaimer
This repository, and every other course unit repos on GitHub correspond to school projects from the respective course. The code on this repo is intended for educational purposes. I do not take any responsibility, liability or whateverity over any code faults, inconsistency or anything else. If you intend on copying most or parts of the code for your school projects, keep in mind that this repo is public, and that your professor might search the web for similar project solutions or whatnot and choose to fail you for copying. 

Template adapted from [zettca](https://github.com/zettca)





## Authors

- Fábio Gaspar (up201503823)
- Luís Oliveira (up201607946)
- Ricardo Silva (up201607780)

## Login

There are three accounts in the database, for example, the following can be used:

- Username: `fabioD`
- Password: `1234`

Other accounts can be created in the login page by clicking at **register** link.

## External libraries

No external libraries were used.

## Overall

YetAnotherSite's project has implemented ALL the minimum requirements.  
From the 9 extra requirements, YetAnotherSite's has implemented SIX requirements, ending with a 85% racio of all
requirements defined.

### Minimum expected requirements:

All users should be able to:
  
- [x] __Register a new account__
- [x] __Login__
- [x] __Logout__
- [x] __Edit their profile__
- [x] __Add a new story__. Each story have a title and some text.
- [x] __View a list of the most recent stories__.
- [x] __Add a comment to a story__.
- [x] __View a story in detail with all comments__.
- [x] __Vote on a story__ Each story can be voted in the up and down arrows on the left side of the screen. Each arrow has two stages, Clicked and noClicked , meaning the voting implementation has four stages in total. Only allows one click in one of the arrows per user on one post, in another words it allows only one vote per user per story.
- [x] __Technologies__: HTML, CSS, PHP, Javascript, Ajax/JSON, PDO/SQL (using sqlite).
- [x] __Security__: 
  - [x] Authentication (hashed passwords, password strength  and recovery of lost credentials)
  - [x] Session Fixation prevention (Session Regeneration, Session Time-out and verification)
  - [x] CSRF prevention (random token-id and hashed token_values with salt)
  - [x] XSS prevention (Escape Scripts on all inputs and gets. Images stored with hash)
  - [x] Use of Prepared Statements and use of Stored Procedures to make queries to the database
  - [x] All inputs are filtered in regex expressions within php functions to delete the scripts characteres. For example, in php we use trim() and strip_tags(). 

### Extra requirements

- [x] __Sorting__: Stories can be sorted in many different ways. The sorting is acessible after the loggin 
on YetAnotherSite. The default view will be the most recent stories added to database, sorted by date. On top the bar with 3 options, it's possible to change between 3 different values _More Recent_, _Most Voted_ (sorted by the total number of votes received) and _More Commented_ (sorted by the the total number of comments with story received).
- [x] __Profiles__: User profiles have a list of all stories and comments posted by them and some of their info. If you are seeeing your own profile, you can edit all your information. Other users cannot see all of your information.
- [x] __Points__: Each user will received a number of points in according to the story posted and the votes received. Good stories with more votes and more comments will give more points. Stories with negative votes will decrease the points received. 
- [x] __Search__: Users can search for stories and comments and users. When used, it performs an exact search of the written term, within the contents searched upon, in four options: search in stories, search in comments, search in users and search in everything.
- [x] __API__: A REST API that allows bots or other apps to use the website.
<br><br>
- [x] __AnythingYouCanThingOf__:

On SignUp section we implement the ability to send a confirmation email. 

We've also added a page to request lost passwords and forgotten usernames that generates a new random password and mails the username and new password to the user.

We have tested a few times and received the confirmation emails. For this feature we had to run one of the following commands in our linux machines: sudo apt-get install sendmail or sudo apt-get install postfix. If none of these modules is not installed in your local server, the singup will fail.

All inputs have javascript validation for immediate user awareness. Security is implemented by php on the server side.

Another module we had to add was for images: sudo apt-get install php7.2-gd.
For both modules to work we also had to make some changes on php.ini file (uncomment).

<br><br>
The following were not implemented:
- [ ] **Multilevel Comments**: Comments can be replies to other comments (2 levels or infinite levels).
- [ ] **Channels**: The site is divided into channels. Stories can be posted in a specific channel. Users can create and subscribe to channels. 
Each channel should have a special place where users can see stories published on those channels. A special place where user can see stories belonging to channels they subscribed to should be available.
- [ ] **References**: Stories and comments can refer to users and channels using some special notation. These should automatically become links 
to the referred user profile or channel.

<br><br>
Web Technologies And Languages - MIEIC FEUP
Projects done in colaboration with [TejInaco](https://github.com/TejInaco) and [Fabiodrg666](https://github.com/Fabiodrg666)
