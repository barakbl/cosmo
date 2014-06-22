<?
namespace Models;

class users extends \Core\Model {
protected $tbl = 'users';


    public function loadUser($username,$password) {
        $params = array(
            ':username' => $username,
            ':password' => md5($password),
        );
        $sql = "SELECT * FROM users u
WHERE u.username like :username AND u.password =  :password

        ";
        $sth = $this->dbh->prepare($sql);

        $sth->execute($params);

        $res = $sth->fetchAll();
        if(!$res) {
            return NULL;
        }
        $result = $res[0];
        if(!empty($result)) {
            $user = new \Core\Auth\User();

            $user->setUsername($result['username']);
            $user->setEmail($result['email']);
            $user->setId($result['id']);
            return $user;
        }
        return NULL;
    }
}