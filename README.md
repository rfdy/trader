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

If User A has given User B:
---------------------------
- More +1 (Positive) Feedbacks than -1 (Negative) Feedbacks,
  then User A will rate User B positively in the overall calculation of User A's Trader Score

- More -1 (Negative) Feedbacks than +1 (Positive) Feedbacks,
  then User A will rate User B positively in the overall calculation of User A's Trader Score





