
    
<?php
echo "TEST";

    //links db
    $database = connectToDB();

    //declarations

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //checks if all fields are filled in
    if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $confirm_password ) ) {
      setError( "Please fill in all fields.", '/signup' );

    //checks if password and confim password are the same
    } else if ( $password !== $confirm_password ) {
      setError( "Both passwords must be the same.", '/signup' );
    
    //checks if password is atleast 8 letters long
    } else if ( strlen( $password ) < 8 ) { 

      setError( "Password must be atleast 8 characters long.", '/signup' );

    }

        else {
          // check if the email already in-used or not
          // sql command
          $sql = "SELECT * FROM users WHERE email = :email";    
    
          //prepare
          $query = $database -> prepare($sql);
    
          // execute
          $query -> execute([
              'email' => $email
          ]);

        }
    
          // fetch
          $user = $query -> fetch(); //return the first row starting from the query row
    
          // if user exists, it means the email already in-used
          if ( $user ) {
            setError( "Email in use.", '/signup' );
          }

    

    //if all the above is satisfied run dis
    else {

        $sql = "INSERT INTO users (`name`,`email`,`password`) VALUES (:name, :email, :password)";

        $query = $database->prepare( $sql );
        
        $query->execute([
            'name' => $name,
            'email' => $email,
            'password' => password_hash ($password, PASSWORD_DEFAULT )
        ]);

        //sends user to login page
        header("Location: /login");
        exit;
        
    }
    
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>