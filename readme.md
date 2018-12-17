# **LTW**

## Overall

YetAnotherSite's project has implemented ALL the minimum requirements.  
From the 9 extra requirements, YetAnotherSite's has implemented SEVEN requirements, ending with a 90% racio of all
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
  
        Authentication \[hashed passwords, password strength  and recovery of lost credentials]

        Session Fixation prevention (Session Regeneration, Session, Time-out and verifying)

        SQL injection prevention (prepared php queries)

        CSRF prevention (random token-id and hashed token_values with salt)

        XSS prevention \[ Escape Scripts on all inputs and images stored with hash(Sha256 and salt)  ]

### Extra requirements

[DONE] __Multilevel Comments__: Comments can be replies to other comments (2 levels or infinite levels).

[DONE] __Sorting__: Stories can be sorted in many different ways. The sorting is acessible after the loggin 
on YetAnotherSite. The default view will be the most recent stories added to database, sorted by date. On top the bar with 3 options, it's possible to change between 3 different values _More Recent_, _Most Voted_ (sorted by the total number of votes received) and _More Commented_ (sorted by the the total number of comments with story received).

[DONE] __Profiles__: User profiles have a list of all stories and comments posted by them. On user profile, it's possible to edit all the user's information, view all the posts made by the user, and view all the comments made by the user.

[DONE] __Points__: Each story can be voted in the up and down arrows on the left side of the screen. Each arrow has two stages, Clicked and noClicked , meaning the voting implementation has four stages in total. Only allows one click in one of the arrows per user on one post, in another words it allows only one vote per user per story.    

[DONE] __Search__: Users can search for stories and comments and another users. When used, it performs an exact search of the written term in four options: search in stories, search in comments, search in users and  search in everything.

[DONE] __API__: A REST API that allows bots or other apps to use the website.

[DONE] __AnythingYouCanThingOf__:

On SignUp section we implement the ability to send a confirmation email to check if the email exists. We have tested a few times and received the confirmation emails. For this feature we had to run the command in our linux machines:
sudo apt-get install postfix. If this module is not install in your local server, the singup will fail

Request  and User name (add by Luis)





[NOT_IMPLEMENTED] Channels: The site is divided into channels. Stories can be posted in a specific channel. Users can create and subscribe to channels. 
Each channel should have a special place where users can see stories published on those channels. A special place where user can see stories belonging to channels they subscribed to should be available.

[NOT_IMPLEMENTED] References: Stories and comments can refer to users and channels using some special notation. These should automatically become links 
to the referred user profile or channel.


Web Technologies And Languages - MIEIC FEUP
Projects done in colaboration with [TejInaco](https://github.com/TejInaco) and [Fabiodrg666](https://github.com/Fabiodrg666)

