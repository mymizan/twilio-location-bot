<?php
/** @package    TwilioBot::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * LogMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the LogDAO to the logs datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package TwilioBot::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class LogMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","logs","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["EventName"] = new FieldMap("EventName","logs","event_name",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["EventDescription"] = new FieldMap("EventDescription","logs","event_description",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["EventDate"] = new FieldMap("EventDate","logs","event_date",false,FM_TYPE_DATETIME,null,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>