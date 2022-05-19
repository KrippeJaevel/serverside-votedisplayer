<?php
$communityUrl = 'https://community.16aa.net';
$apiKey = 'API_KEY_GENERATED_IN_ADMIN_CP';
function getMembers(string $url=$communityUrl,string $key=$apiKey)
{
    //usage: /core/groups/{int id}
    //secondary groups x section, + ic bods
    $endpointOneOne=("/core/groups/" + "int id 1/1, int id 1/1 ic, int id 1/1 2ic");
    $curl = curl_init( $url . 'api' . $endpointOneOne );
    
    curl_setopt_array( $curl, array(
        CURLOPT_RETURNTRANSFER	=> TRUE,
        CURLOPT_HTTPAUTH	=> CURLAUTH_BASIC,
        CURLOPT_USERPWD		=> "{$key}:",
        CURLOPT_USERAGENT		=> "MyUserAgent/1.0"
    ) );
    $response = curl_exec($curl);
    return $response;
}

function getRsvp(string $url=$communityUrl,string $key=$apiKey)
{
    //fetch event id from url
    $eventId = subtstr($_SERVER['REQUEST_URI'],0,3);

    //usage /calendar/events/{id}/rsvps
    $endpointRsvp = '/calendar/events/' + $eventId + '/rsvps';
    $curl = curl_init( $url . 'api' . $endpointRsvp );
    curl_setopt_array( $curl, array(
        CURLOPT_RETURNTRANSFER	=> TRUE,
        CURLOPT_HTTPAUTH	=> CURLAUTH_BASIC,
        CURLOPT_USERPWD		=> "{$key}:",
        CURLOPT_USERAGENT		=> "MyUserAgent/1.0"
    ) );
    $response = curl_exec($curl);
    return $response;
}

function renderPage()
{
    $members=getMembers();
    $rsvp=getRsvp();
    //$noVotes=array();
    //use some data container of getMembers listed by secondaryGroup
    //echo start html
    //for each category (y/maybe/n/notVoted) of voters and non-voters
    //{
    //    echo '<li>'+voters_by_secondaryGroup+'</li>';
    //}
    //echo end html
}
?>