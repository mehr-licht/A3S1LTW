# **LTW**

### Info

### Minimum expected requirements are the following:

All users should be able to:
  
  [DONE] Register a new account.
  
  [DONE] Login
  
  [DONE] logout.
  
  [DONE] Edit their profile.
  
  [DONE] Add a new story. Each story should have a title and some text.
  
  [DONE] View a list of the most recent stories.
  
  [DONE] Add a comment to a story.
  
  [DONE] View a story in detail with all comments.
  
  [DONE] Vote on a story or comment (up or down; only one vote per user and story/comment).
 
  [DONE] Technologies:
          HTML, CSS, PHP, Javascript, Ajax/JSON, PDO/SQL (using sqlite).



The web site should be as secure as possible.

 _+ Multilevel Comments: Comments can be replies to other comments (2 levels or infinite levels).

Channels: The site is divided into channels. Stories can be posted in a specific channel. Users can create and subscribe to channels. 
Each channel should have a special place where users can see stories published on those channels. A special place where user can see stories belonging to channels they subscribed to should be available.

_+ Sorting: Stories can be sorted in many different ways (most voted up, more recent, more comments, …).

[DONE] Profiles: User profiles have a list of all stories and comments posted by them.

_+ Points: Each time a story or comment from a user is voted up, the user gets some points; and when they are voted down they lose points.

References: Stories and comments can refer to users and channels using some special notation. These should automatically become links 
to the referred user profile or channel.

[DONE] Search: Users can search for channels, stories and comments.

API: A REST API that allows bots or other apps to use the website.



Web Technologies And Languages - MIEIC FEUP

Projects done in colaboration with [TejInaco](https://github.com/TejInaco) and [Fabiodrg666](https://github.com/Fabiodrg666)







**Security:**
[DONE] authentication \[hashed passwords (could have added salt) and recovery of lost credentials]

[DONE] Session Fixation prevention (Session Regeneration, Session, Time-out and verifying)

[DONE] SQL injection prevention (prepared queries)

[DONE] CSRF prevention (random token-id and hashed token_values with salt)

[DONE] XSS prevention \[ Escape Scripts on all inputs and images stored with hash(Sha256 and salt)  ]
