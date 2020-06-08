<?php

class UserDAO
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @return User[]
     */
    public function getAll() : array
    {
        $query = 'SELECT * FROM `users`';
        $rows = $this->db->getRows($query);
        $usersObjects = [];
        foreach ($rows as $row) {
            $usersObjects[] = $this->getUserObject($row);
        }

        return $usersObjects;
    }

    public function getUser(string $login) : User
    {
        // zapytanie sprawdzajace czy dany uzytkowni
        $query = 'SELECT * FROM users WHERE login = "' . $login . '"';
        $row = $this->db->getRow($query);

        return $this->getUserObject($row);
    }

    private function getUserObject(array $row) : User
    {
        $userObject = new User();
        if (isset($row['login'])) {
            $userObject->login = $row['login'];
            $userObject->pass = $row['pass'];
            $userObject->email = $row['email'];
            $userObject->age = $row['age'];
        }

        return $userObject;
    }

    public function add(User $user)
    {
        $query = "
        INSERT INTO `users` (`login`, `pass`) 
        VALUES ('{$user->login}', '{$user->pass}');";

        return $this->db->query($query);
    }
}
