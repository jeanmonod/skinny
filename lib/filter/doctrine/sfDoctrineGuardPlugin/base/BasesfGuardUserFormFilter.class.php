<?php

/**
 * sfGuardUser filter form base class.
 *
 * @package    skinny
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'algorithm'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'salt'                    => new sfWidgetFormFilterInput(),
      'password'                => new sfWidgetFormFilterInput(),
      'is_active'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_super_admin'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_login'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'email'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'new_password'            => new sfWidgetFormFilterInput(),
      'new_password_created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'groups_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup')),
      'permissions_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
      'skinny_checks_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SkinnyItem')),
    ));

    $this->setValidators(array(
      'username'                => new sfValidatorPass(array('required' => false)),
      'algorithm'               => new sfValidatorPass(array('required' => false)),
      'salt'                    => new sfValidatorPass(array('required' => false)),
      'password'                => new sfValidatorPass(array('required' => false)),
      'is_active'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_super_admin'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_login'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'new_password'            => new sfValidatorPass(array('required' => false)),
      'new_password_created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'groups_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup', 'required' => false)),
      'permissions_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
      'skinny_checks_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SkinnyItem', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.sfGuardUserGroup sfGuardUserGroup')
          ->andWhereIn('sfGuardUserGroup.group_id', $values);
  }

  public function addPermissionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.sfGuardUserPermission sfGuardUserPermission')
          ->andWhereIn('sfGuardUserPermission.permission_id', $values);
  }

  public function addSkinnyChecksListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.SkinnyCheck SkinnyCheck')
          ->andWhereIn('SkinnyCheck.item_id', $values);
  }

  public function getModelName()
  {
    return 'sfGuardUser';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'username'                => 'Text',
      'algorithm'               => 'Text',
      'salt'                    => 'Text',
      'password'                => 'Text',
      'is_active'               => 'Boolean',
      'is_super_admin'          => 'Boolean',
      'last_login'              => 'Date',
      'email'                   => 'Text',
      'new_password'            => 'Text',
      'new_password_created_at' => 'Date',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'groups_list'             => 'ManyKey',
      'permissions_list'        => 'ManyKey',
      'skinny_checks_list'      => 'ManyKey',
    );
  }
}
