Trader
======
Trader extension for phpBB 3.1 - a rating system for Buy, Sell and Trade forums

Enabling Trader on Forums:
--------------------------
Before everything, you need to enable the Trader extension in the Administrator Control Panel (Manage Extensions page).
After it has been enabled, Trader variations (Buy, Sell, Trade) can be enabled on a forum-by-forum basis.

You will be able to select which Trader options you would like to enable on a forum while creating or editing a forum.

For example, you can enable Buy and Sell on a forum, which means that topics created in those forums can only be
Buy or Sell topics.

(NOTE: - when editing a forum that has existing posts, the existing topics will be stale and not have a
         default Trader type associated with it - meta information about the topic will not be properly displayed
       - It is HIGHLY RECOMMENDED to enable Trader options only on forums which DO NOT have existing posts
          This is because the topic's Trader type is used for displaying information on Trader pages)

Feedback System
---------------
With the trader feedback system, a user can rate other users either positively (+1), neutrally (0) or negatively (-1).
The rating given to other users is the summations of all feedback. A user can only give 1 feedback per topic in
forums where the Trader Extension is enabled.

There are permissions for both leaving and viewing trader feedback. By default, all registered users have permission
to leave and view feedback, while guests only have permission to view feedback. 

When a user leaves trader feedback for someone else, the recipient has the option of replying to that feedback. The
recipient of that new feedback (the original sender) cannot make any further replies.

Users have the option of leaving private comments when leaving trader feedback to someone else. These private comments
can only be viewed by the sender of the feedback, its recipient, and moderators.

Moderators may be given permission to edit and delete trader feedback. Deleted feedback is saved in the database and 
may be restored at a later point by moderators. Upon editing the feedback, moderators can view its edit history. The 
original sender of the feedback can edit their feedback for a limited period of time after it was initially sent, and 
they cannot view the edit history. 

Moderation
----------
If a moderator has edit/delete permissions for trader feedback, they also have access to the Trader report tabs in the 
Moderator Control Panel. Moderators may close and/or delete trader feedback reports - similar to how they can 
close/delete post and PM reports.

If User A has given User B:
---------------------------
- More +1 (Positive) Feedbacks than -1 (Negative) Feedbacks,
  then User A will rate User B positively in the overall calculation of User A's Trader Score

- More -1 (Negative) Feedbacks than +1 (Positive) Feedbacks,
  then User A will rate User B positively in the overall calculation of User A's Trader Score

Files:
======

Trader.php
----------
function construct              - setting class members to the arguments passed in

function defaultAction          - triggered when url is /trader/give-feedback/
                                - gathers information from the user request and conducts error checking
                                - if the form is valid, the feedback, ratings, date and time posted among others are added
                                  to the database
                                - finally renders the content of the page
                            
function editFeedbackAction     - triggered when url is /trader/edit-feedback/
                                - conducts error checking on modifications to the feedback
                                - deletes the feedback or submits the changes made
                                - renders the content modified using the template
                            
function viewUserFeedbackAction - performs error checking and if user is valid
                                - collects information about the feedback and its latest comment from the database
                                - renders the user feedback using the template
                                
function report_feedback-action - if user confirms, the feedback gets reported

function getUser                - retrieves user information from the database using the user_id

function getTopic               - retrieves topic information from the database using the topic_id
