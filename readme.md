# **LTW**

## Overall

YetAnotherSite's project has implemented ALL the minimum requirements.  
From the 9 extra requirements, YetAnotherSite's has implemented SEVEN requirements, ending with a 85% racio of all
requirements defined.

### Minimum expected requirements:

All users should be able to:
  
  [DONE] __Register a new account__.
  
  [DONE] __Login__
  
  [DONE] __Logout__.
  
  [DONE] __Edit their profile__.
  
  [DONE] __Add a new story__. Each story have a title and some text.
  
  [DONE] __View a list of the most recent stories__.
  
  [DONE] __Add a comment to a story__.
  
  [DONE] __View a story in detail with all comments__.
  
  [DONE] __Vote on a story__ Each story can be voted in the up and down arrows on the left side of the screen. Each arrow has two stages, Clicked and noClicked , meaning the voting implementation has four stages in total. Only allows one click in one of the arrows per user on one post, in another words it allows only one vote per user per story.
 
  [DONE] __Technologies__: HTML, CSS, PHP, Javascript, Ajax/JSON, PDO/SQL (using sqlite).

  [DONE] __Security__: 
  
        Authentication (hashed passwords, password strength  and recovery of lost credentials)

        Session Fixation prevention (Session Regeneration, Session Time-out and verification)

        CSRF prevention (random token-id and hashed token_values with salt)

        XSS prevention (Escape Scripts on all inputs and gets. Images stored with hash)

        Use of Prepared Statements and use of Stored Procedures to make queries to the database
        
        All inputs are filtred in regex expressionas, php fuctions or java fuctions to deleted the scripts caracteres. For example, in php we use trim() and strip_tags(). 

### Extra requirements


[DONE] __Sorting__: Stories can be sorted in many different ways. The sorting is acessible after the loggin 
on YetAnotherSite. The default view will be the most recent stories added to database, sorted by date. On top the bar with 3 options, it's possible to change between 3 different values _More Recent_, _Most Voted_ (sorted by the total number of votes received) and _More Commented_ (sorted by the the total number of comments with story received).

[DONE] __Profiles__: User profiles have a list of all stories and comments posted by them and some of their info. If you are seeeing your own profile, you can edit all your information. Other users cannot see all of your information.

[DONE] __Points__: Each user will received a number of points in according to the story posted and the votes received. Good stories with more votes and more comments will give more points. Stories with negative votes will decrease the points received.       

[DONE] __Search__: Users can search for stories and comments and users. When used, it performs an exact search of the written term, within the contents searched upon, in four options: search in stories, search in comments, search in users and search in everything.

[DONE] __API__: A REST API that allows bots or other apps to use the website.

[DONE] __AnythingYouCanThingOf__:

On SignUp section we implement the ability to send a confirmation email. 

We've also added a page to request lost passwords and forgotten usernames that generates a new random password and mails the username and new password to the user.

We have tested a few times and received the confirmation emails. For this feature we had to run one of the following commands in our linux machines: sudo apt-get install sendmail or sudo apt-get install postfix. If none of these modules is not installed in your local server, the singup will fail.

All inputs have javascript validation for immediate user awareness. Security is implemented by php on the server side.

Another module we had to add was for images: sudo apt-get install php7.2-gd.
For both modules to work we also had to make some changes on php.ini file (uncomment).

[NOT_IMPLEMENTED] Multilevel Comments: Comments can be replies to other comments (2 levels or infinite levels).

[NOT_IMPLEMENTED] Channels: The site is divided into channels. Stories can be posted in a specific channel. Users can create and subscribe to channels. 
Each channel should have a special place where users can see stories published on those channels. A special place where user can see stories belonging to channels they subscribed to should be available.

[NOT_IMPLEMENTED] References: Stories and comments can refer to users and channels using some special notation. These should automatically become links 
to the referred user profile or channel.


Web Technologies And Languages - MIEIC FEUP
Projects done in colaboration with [TejInaco](https://github.com/TejInaco) and [Fabiodrg666](https://github.com/Fabiodrg666)

