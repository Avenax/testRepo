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
