<?php
	namespace Authorization;
	class DataBase
	{
		private $connection;
		private $isConnected;
		public function __construct($settings)
		{
			$this->connect($settings);
		}

		private function connect( $settings) : void
		{
			try
			{
				$this->connection = new \PDO('mysql:host=' . $settings['host'] . "; dbname=" . $settings['dbname'], $settings['user'], $settings['password'], [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
				$this->isConnected = true;
			}
			catch( \PDOException $e)
			{
				echo $e-getMessage();
			}
		}

		public function closeConnection() : void
		{
			$this->connection = null;
			$this->isConnected = false;
		}

		public function getConnection()
		{
			return $this->isConnected;
		}

		public function insertIntoDB( $data) : bool
		{
			$sql = "INSERT INTO `users` (`login`, `email`, `password`, `data`) VALUES (:login, :email, :password, :data)";
			$result = $this->connection->prepare( $sql);
			$result->execute( $data);
			if( $result->rowCount() != 0)
				return true;
			return false;
		}
		
		public function getLogin( $login) : int
		{
			$sql = "SELECT COUNT(*) FROM `users` WHERE `login` LIKE '$login'";
			$result = $this->connection->query( "SELECT COUNT(*) FROM `users` WHERE `login` LIKE '$login'");
			return $result->fetchColumn();
		}

		public function getEmail( $email) : int
		{
			$sql = "SELECT COUNT(*) FROM `users` WHERE `email` LIKE '$email'";
			$result = $this->connection->query( $sql);
			return $result->fetchColumn();
		}

		public function logining( $login) : array
		{
			$sql = "SELECT `login`, `password` FROM `users` WHERE `login` LIKE '$login'";
			$result = $this->connection->query($sql);
			return $result->fetch(\PDO::FETCH_ASSOC);
		}
		
		public function __destruct()
		{
			$connection = null;
		}
	}