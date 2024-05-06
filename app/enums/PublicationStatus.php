<?php

namespace App\Enums;

enum PublicationStatus: string
{
    case PUBLISHED = 'Publicado';
    case NOPUBLISHED = 'No Publicado';

}