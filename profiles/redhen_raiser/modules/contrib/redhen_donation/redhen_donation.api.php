<?php

/**
 * @file
 * API documentation for Redhen Dontations module.
 */

/**
 * Override redhen_donation_access with custom access control logic.
 *
 * @param string $op
 *   Access operation.
 * @param RedhenDonation $donation
 *   RedHen Donation object.
 * @param object $account
 *   User account.
 *
 * @return bool
 *   Access boolean.
 */
function hook_redhen_donation_access($op, $donation, $account = NULL) {
  if ($donation->user_uid == $account->uid) {
    return TRUE;
  }
}


/**
 * Provide a form API element exposed as a Donation entity setting.
 *
 * @param array $settings
 *   Existing settings values.
 *
 * @return array
 *   A FAPI array for a donation setting.
 */
function hook_redhen_donation_entity_settings($settings) {
  return array(
    'redhen_donation_entity_access_roles' => array(
      '#type' => 'checkboxes',
      '#title' => t('Roles'),
      '#description' => t('Override default access control settings by selecting which roles can donate.'),
      '#options' => user_roles(),
      '#default_value' => isset($settings['settings']['redhen_donation_entity_access_roles']) ? $settings['settings']['redhen_donation_entity_access_roles'] : NULL,
    ),
  );
}

/**
 * Allow modules to customize the title of donation pages.
 */
function hook_redhen_donation_title_alter(&$title, $entity_type, $entity) {
}

/**
 * Provide access to a donation after each save.
 *
 * Useful for calculating running totals.
 *
 * @param RedhenDonation $donation
 *   Redhen Donation Object
 */
function hook_redhen_donation_save($donation) {
}

/**
 * Provides a way to alter access to the donation status.
 *
 * @param string $status
 *   The current status
 * @param array $context
 *   Contextual information about the item being altered:
 *   - 'entity_type': The host entity type.
 *   - 'entity_id': The host entity ID.
 *   - 'errors'(optional) An array of error message strings.
 */
function hook_redhen_donation_status_alter($status, $context) {

}
