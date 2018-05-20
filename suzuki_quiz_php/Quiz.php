<?php

namespace MyApp;

class Quiz {
  private $_quizSet = [];

  public function __construct() {
    $this->_setup();
    Token::create();

    if (!isset($_SESSION['current_num'])) {
      $this->_initSession();
    }
  }

  private function _initSession() {
    $_SESSION['current_num'] = 0;
    $_SESSION['correct_count'] = 0;
  }

  public function checkAnswer() {
    Token::validate('token');
    $correctAnswer = $this->_quizSet[$_SESSION['current_num']]['a'][0];
    if (!isset($_POST['answer'])) {
      throw new \Exception('answer not set!');
    }
    if ($correctAnswer === $_POST['answer']) {
      $_SESSION['correct_count']++;
    }
    $_SESSION['current_num']++;
    return $correctAnswer;
  }

  public function isFinished() {
    return count($this->_quizSet) === $_SESSION['current_num'];
  }

  public function getScore() {
    return round($_SESSION['correct_count'] / count($this->_quizSet) * 100);
  }

  public function isLast() {
    return count($this->_quizSet) === $_SESSION['current_num'] + 1;
  }

  public function reset() {
    $this->_initSession();
  }

  public function getCurrentQuiz() {
    return $this->_quizSet[$_SESSION['current_num']];
  }

  private function _setup() {
    $this->_quizSet[] = [
      'q' => '鈴木孝伸の誕生日は？',
      'a' => ['6月5日', '7月30日', '12月3日', '1月1日'],
      'i' => ''
    ]; 
    $this->_quizSet[] = [
      'q' => '鈴木孝伸のあだ名は?',
      'a' => ['のぶ', 'ズッキー', 'スズキックス', 'タッカー'],
      'i' => ''
    ];
    $this->_quizSet[] = [
      'q' => '鈴木孝伸の出身地は？',
      'a' => ['横浜', '東京', '大阪', '沖縄'],
      'i' => ''
    ];
    $this->_quizSet[] = [
      'q' => '鈴木孝伸の趣味は?',
      'a' => ['読書', '野球', 'スキューバーダイビング', 'プラモデル'],
      'i' => ''
    ];  
    $this->_quizSet[] = [
      'q' => '鈴木孝伸の好きな食べ物は？',
      'a' => ['カレー', '納豆', '松茸', '寿司'],
      'i' => ''
    ];



  }
}