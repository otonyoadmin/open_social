<?php


namespace Drupal\social_content_export\Controller;


use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ContentDownloadController extends ControllerBase {
/**
 * @param $name
 * @return string
 */
  public function download($name) {
    $file_path = file_directory_temp() . '/' . $name;
    $response = new BinaryFileResponse($file_path);
    $disposition = $response->headers->makeDisposition(
     ResponseHeaderBag::DISPOSITION_ATTACHMENT,
     $name
    );
    $response->headers->set('Content-Disposition', $disposition);

    return $response;
  }
}