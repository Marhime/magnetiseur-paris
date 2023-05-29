<?php

namespace App\Enums;

enum MessageType: string {
    case TESTIMONIAL = 'testimonial';
    case QUESTION = 'question';
    case OTHER = 'other';
}
