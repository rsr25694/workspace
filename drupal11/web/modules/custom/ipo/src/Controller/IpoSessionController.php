<?php

namespace Drupal\ipo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class IpoSessionController extends ControllerBase {

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected RequestStack $requestStack;

  /**
   * Constructor.
   */
  public function __construct(RequestStack $request_stack) {
    $this->requestStack = $request_stack;
  }

  /**
   * Dependency injection.
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('request_stack')
    );
  }

  /**
   * Session operations demo.
   */
  public function sessionOperations(): array {

    // Get the current session.
    $session = $this->requestStack->getCurrentRequest()->getSession();

    /*
     * 1. SET SESSION DATA.
     */
    $session->set('ipo_username', 'John');
    $session->set('ipo_role', 'administrator');
    $session->set('ipo_count', 10);

    /*
     * 2. GET SESSION DATA.
     */
    $username = $session->get('ipo_username');
    $role = $session->get('ipo_role');
    $count = $session->get('ipo_count');

    /*
     * 3. CHECK WHETHER SESSION DATA EXISTS.
     */
    $has_username = $session->has('ipo_username');

    /*
     * 4. UPDATE SESSION DATA.
     */
    $session->set('ipo_count', $count + 1);

    /*
     * 5. GET UPDATED VALUE.
     */
    $updated_count = $session->get('ipo_count');

    /*
     * 6. REMOVE ONE SESSION VALUE.
     */
    // $session->remove('ipo_role');

    /*
     * 7. CLEAR ALL SESSION DATA.
     */
    // $session->clear();

    /*
     * 8. INVALIDATE THE SESSION.
     *
     * This destroys the current session and creates
     * a new session on the next request.
     */
    // $session->invalidate();

    return [
      '#theme' => 'item_list',
      '#title' => 'Drupal 11 Session Operations',
      '#items' => [
        'Username: ' . ($username ?? 'Not set'),
        'Role: ' . ($role ?? 'Not set'),
        'Count: ' . $updated_count,
        'Username exists: ' . ($has_username ? 'YES' : 'NO'),
      ],
    ];
  }

}
