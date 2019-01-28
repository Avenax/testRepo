<?php

/**
 * <p>Отсекает от строки все символы свыше указанной длины. Если отсечение произошло, то к строке справа дописывается многоточие.</p>
 *
 *
 * @param string $text  Исходная строка.
 *
 * @param int $Len  Длина конечной строки.
 *
 * @return string 
 *
 * <h4>Example</h4> 
 * <pre bgcolor="#323232" style="padding:5px;">
 * &lt;?
 * $str = "1234567890";
 * echo <b>TruncateText</b>($str, 7);
 * // результатом будет строка "1234567..."
 * ?&gt;
 * </pre>
 *
 *
 * <h4>See Also</h4> 
 * <ul><li> <a href="http://dev.1c-bitrix.ru/api_help/main/functions/string/insertspaces.php">InsertSpaces</a> </li></ul><a
 * name="examples"></a>
 *
 *
 * @static
 * @link http://dev.1c-bitrix.ru/api_help/main/functions/string/truncatetext.php
 * @author Bitrix
 */
function TruncateText($strText, $intLen)
{
	if(strlen($strText) > $intLen)
		return rtrim(substr($strText, 0, $intLen), ".")."...";
	else
		return $strText;
}

/**
 * <p>Проверяет физическое существование указанного пути. При необходимости - создает все каталоги входящие в данный путь.</p>   <p>Права на каталоги, которые будут устанавливаться этой функцией, должны быть предварительно определены в константе BX_DIR_PERMISSIONS (в файлах <b>/bitrix/php_interface/dbconn.php</b> или <nobr><b>/bitrix/php_interface/</b><i>ID сайта</i><b>/init.php</b></nobr>). Если константа не определена, то она автоматически инициализируется значением 0777 и далее это значение используется везде когда дело касается установки Unix прав на файлы и каталоги.</p> <p>АНалог метода в новом ядре: <a href="http://dev.1c-bitrix.ru/api_d7/bitrix/main/io/directory/createdirectory.php" >Bitrix\Main\IO\Directory::createDirectory </a>.</p>
 *
 *
 * @param string $path  Абсолютный путь к папке.
 *
 * @param bool $permissions = true Если значение данного параметра равно "true" и если последний
 * каталог пути указанного в параметре <i>abs_path</i> не доступен для
 * записи, то будет предпринята попытка установить новые права на
 * данный каталог. Значения для этих прав будут браться либо из
 * константы BX_DIR_PERMISSIONS, либо если константа не определена, то она
 * автоматически инициализируется значением 0777 и далее это
 * значение используется везде когда дело касается установки Unix
 * прав на файлы и каталоги.
 *
 * @return mixed 
 *
 * <h4>Example</h4> 
 * <pre bgcolor="#323232" style="padding:5px;">
 * &lt;?
 * // файл /bitrix/php_interface/dbconn.php
 * 
 * // определим константы для прав на каталоги и файлы
 * define("BX_FILE_PERMISSIONS", 0775);
 * define("BX_DIR_PERMISSIONS", 0775);
 * ?&gt;&lt;?
 * // Создадим путь "/temp/data/" начиная от корня сайта, если этого пути нет
 * <b>CheckDirPath</b>($_SERVER["DOCUMENT_ROOT"]."/temp/data/");
 * ?&gt;
 * </pre>
 *
 *
 * <h4>See Also</h4> 
 * <ul> <li> <a href="http://dev.1c-bitrix.ru/api_help/main/general/constants.php">Права для новых
 * файлов и каталогов</a> </li> </ul><a name="examples"></a>
 *
 *
 * @static
 * @link http://dev.1c-bitrix.ru/api_help/main/functions/file/checkdirpath.php
 * @author Bitrix
 */
function CheckDirPath($path, $bPermission = true)
{
	$path = str_replace(array("\\", "//"), "/", $path);
	//remove file name
	if(substr($path, -1) != "/")
	{
		$p = strrpos($path, "/");
		$path = substr($path, 0, $p);
	}
	$path = rtrim($path, "/");
	if($path == "")
	{
		//current folder always exists
		return true;
	}
	if(!file_exists($path))
	{
		return mkdir($path, BX_DIR_PERMISSIONS, true);
	}
	return is_dir($path);
}
