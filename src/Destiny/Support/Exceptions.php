<?php namespace Destiny\Support\Exceptions;

class PlayerNotFoundException extends \OutOfBoundsException {}
class NoCharactersFoundException extends \OutOfBoundsException {}
class CharacterNotFoundException extends \OutOfBoundsException {}
class HashNotFoundException extends \OutOfBoundsException {}
class BungieUnavailableException extends \RuntimeException {}