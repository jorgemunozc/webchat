<?php

namespace App\Enums;

enum FriendRequestStatus
{
    case Pending;
    case Accepted;
    case Denied;
}
