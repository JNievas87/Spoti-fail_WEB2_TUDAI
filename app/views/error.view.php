<?php
class ErrorView {
    public function renderError($mensaje) {
        echo "<div class='error'>$mensaje</div>";
    }
}