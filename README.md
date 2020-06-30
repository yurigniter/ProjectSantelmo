#Overview

This is the simple chat Web application.
It is like Messanger in facebook and Direct message in twitter.

#sign-up.psd

##When a user clicks "Sign up / Log in" button
If a user has no account, he can create own account.
And his username and password are recorded in DB.

If a user has own account, he can log in the chat app and transfer to the chat page.

If values in inputs are blank or aren't correct, error messages are shown.


##Q&A
Please confirm if following output is true
Sign-up.psd 
    1. If Username exist and password is correct > Automatic login and direct to chat.psd. 
    2. If Username does not exist and password has value > Automatic create account and direct to chat.psd and no need for re-enter password
    3.The sign-up page indicates the following:
        Others will be able to find you by
        searching for your email address or phone 
        number when provided.
    Username:
        - Can be email or phone?
        - Any unique alphanumeric characters?


#chat.psd

##When a user clicks "Log out" button
A user can log out and transfer to the sign-up page.

##When a user clicks "send" button
Texts in the input is outputted in the chat contents area.

If the input is blank, no thing happens.

##the chat contents area
All messages are stored in the DB and displayed in the component.
New messages are added at the bottom and the component automatically scrolls down.

If other users have already sent messages, they are recorded in DB and shown with thir name.

And please use Web socket if you can know about it.
