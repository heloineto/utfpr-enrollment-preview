<?php
class FallbackController {
  public function index() {
    require('models/fallback.model.php');
    require('views/fallback.view.php');
  }
}