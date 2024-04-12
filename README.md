1. First Extract the zip file shared.

2. Now add database name in .env file i.e. DB_DATABASE=richreach_db

3. Run all Migrations by using this command : php artisan migrate

4. Run all Seeders by using this command : php artisan db:seed
   this will create 2 enteries in users table i.e.

    name="Abhishek", email = "abhishek@gmail.com", password = "123456"
    name="Sachin", email = "sachin@gmail.com", password = "123456"

5. Now You can run the route on localohost i.e. http://127.0.0.1:8000/register from here you can create a new user.

6. After creating user Successfully now you can logged in by using this route i.e. http://127.0.0.1:8000/login

7. After Successfully Logged in user will be redirected to this route http://127.0.0.1:8000/posts
   here you can see all posts list which are created by different user.

8. User can create the post,edit the post and delete the post.

9. User can edit and delete the post only which is created by that logged in user.

10. Post which are created by another user for that Edit and Delete Button will not come as we do not provide access to those posts.

11. Now if user is not logged in and then you go to http://127.0.0.1:8000/posts this route then visitor can see only view button if visitor click on Add Post button then visitor will be redirected to this route http://127.0.0.1:8000/login as only authenticated user will be able to create post (this is achieved by the custom middelware created i.e. UserAuthenticate).

12. User Can logout by clicking on logout link present on Navbar.

13. User can Run all Test cases by using this command php artisan test.
