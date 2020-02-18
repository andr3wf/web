<?php
	namespace AlcoWarsGame;
	class Alcoholic
	{
		private $name;
		private $healthPoints;
		private $avatars = array( 0 => 'images/bomj1.jpg', 1 => 'images/bomj2.jpg', 2 => 'images/bomj3.jpg');
		private $avatar;
		public function __construct( $name, $hp, $avatar)
		{
			$this->name = $name;
			$this->healthPoints = $hp;
			$this->avatar = $this->avatars[$avatar];
		}

		public function getName() : string
		{
			return $this->name;
		}

		public function healthLeft() : int
		{
			return $this->healthPoints;
		}

		public function getAvatar()
		{
			return $this->avatar;
		}

		public function hit( $hp)
		{
			$this->healthPoints -= $hp;
		}
	}