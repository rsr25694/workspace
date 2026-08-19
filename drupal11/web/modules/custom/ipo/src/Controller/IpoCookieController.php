<?php

namespace Drupal\ipo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class IpoCookieController extends ControllerBase {

  /**
   * Demonstrate Drupal 11 cookie operations.
   */
  public function cookieOperations(): Response {

    $response = new Response();

    $cookie = Cookie::create(
      'ipo_username',
      'John',
      time() + 3600, // Expires after 1 hour.
      '/',
      NULL,
      FALSE,         // Secure: FALSE for local HTTP development.
      TRUE,          // HttpOnly.
      FALSE,         // Raw.
      'Lax'          // SameSite.
    );

    $response->headers->setCookie($cookie);

    // $request->cookies->get('ipo_username');

     /* $cookie = Cookie::create(
     *   'ipo_username',
     *   'David',
     *   time() + 3600,
     *   '/',
     *   NULL,
     *   FALSE,
     *   TRUE,
     *   FALSE,
     *   'Lax'
     * );
     *
     * $response->headers->setCookie($cookie);
     */

    /*
     * $response->headers->clearCookie(
     *   'ipo_username',
     *   '/',
     *   NULL,
     *   FALSE,
     *   TRUE,
     *   'Lax'
     * );
     */


    /*
     * $request->cookies->get('ipo_username');
     * $request->cookies->has('ipo_username');
     */

    $response->setContent(
      'Cookie "ipo_username" has been set with value "John".'
    );

    return $response;
  }

}
