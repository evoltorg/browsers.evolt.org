<?
/*
* Copyright 2003 - 2005 Mark O'Sullivan
* This file is part of the Lussumo Filebrowser.
* The Lussumo Filebrowser is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
* The Lussumo Filebrowser is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
* You should have received a copy of the GNU General Public License along with the Lussumo Filebrowser; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
* The latest source code is available at www.lussumo.com
* Contact Mark O'Sullivan at mark [at] lussumo [dot] com
* 
* Description: Creates and saves thumbnails to the filesystem.
*/

error_reporting(E_ALL);

// Global Constants
// define("sgLIBRARY", "c:/applications/lussumo/GlobalLibrary/");
define("sgLIBRARY", "/applications/lussumo/GlobalLibrary/");

// Define XML Node Types
define("XmlNodeTypeContainer", 1);
define("XmlNodeTypeContent", 2);

// return the opposite of the given boolean value
function FlipBool($Bool) {
	$Bool = ForceBool($Bool, 0);
	return $Bool?0:1;
}

// Take a value and force it to be an array.
function ForceArray($InValue, $DefaultValue) {
	if(is_array($InValue)) {
		$aReturn = $InValue;
	} else {
		// assume it's a string
		$sReturn = trim($InValue);
		$length = strlen($sReturn);
		if($length == 0) {
			$aReturn = $DefaultValue;
		} else {
			$aReturn = array($sReturn);
		}
	}
	return $aReturn;
}

// Force a boolean value
// Accept a default value if the input value does not represent a boolean value
function ForceBool($InValue, $DefaultBool) {
	// If the invalue doesn't exist (ie an array element that doesn't exist) use the default
	if (!$InValue) $InValue = $DefaultBool;
	$InValue = strtoupper($InValue);
	$bReturn = $DefaultBool;
	
	if ($InValue == "TRUE" || $InValue == "FALSE" || $InValue == 1 || $InValue == 0 || $InValue == "Y" || $InValue == "N") {
		if ($InValue == "TRUE" || $InValue == 1 || $InValue == "Y") {
			$bReturn = 1;
		} else {
			$bReturn = 0;
		}
	}
	return $bReturn;
}

// Check both the get and post incoming data for a variable
function ForceIncomingArray($VariableName, $DefaultValue) {
	// First check the querystring
	$aReturn = ForceSet(@$_GET[$VariableName], $DefaultValue);
	$aReturn = ForceArray($aReturn, $DefaultValue);
	// If the default value was defined, then check the post variables
	if ($aReturn == $DefaultValue) {
		$aReturn = ForceSet(@$_POST[$VariableName], $DefaultValue);
		$aReturn = ForceArray($aReturn, $DefaultValue);
	}
	return $aReturn;	
}

// Check both the get and post incoming data for a variable
function ForceIncomingBool($VariableName, $DefaultBool) {
	// First check the querystring
	$bReturn = ForceSet(@$_GET[$VariableName], $DefaultBool);
	$bReturn = ForceBool($bReturn, $DefaultBool);
	// If the default value was defined, then check the post variables
	if ($bReturn == $DefaultBool) {
		$bReturn = ForceSet(@$_POST[$VariableName], $DefaultBool);
		$bReturn = ForceBool($bReturn, $DefaultBool);
	}
	return $bReturn;	
}

// Check both the get and post incoming data for a variable
// Does not allow integers to be less than 0
function ForceIncomingInt($VariableName, $DefaultValue) {
	// First check the querystring
	$iReturn = ForceSet(@$_GET[$VariableName], $DefaultValue);
	$iReturn = ForceInt($iReturn, $DefaultValue);
	// If the default value was defined, then check the form variables
	if ($iReturn == $DefaultValue) {
		$iReturn = ForceSet(@$_POST[$VariableName], $DefaultValue);
		$iReturn = ForceInt($iReturn, $DefaultValue);
	}
	// If the value found was less than 0, set it to the default value
	if($iReturn < 0) $iReturn == $DefaultValue;

	return $iReturn;	
}

// Check both the get and post incoming data for a variable
function ForceIncomingString($VariableName, $DefaultValue) {
	// First check the querystring
	$sReturn = ForceSet(@$_GET[$VariableName], $DefaultValue);
	$sReturn = ForceString($sReturn, $DefaultValue);
	// If the default value was defined, then check the post variables
	if ($sReturn == $DefaultValue) {
		$sReturn = ForceSet(@$_POST[$VariableName], $DefaultValue);
		$sReturn = ForceString($sReturn, $DefaultValue);
	}
	// And strip slashes from the string
   $sReturn = stripslashes($sReturn);
	return $sReturn;	
}

// Take a value and force it to be an integer.
function ForceInt($InValue, $DefaultValue) {
	$iReturn = intval($InValue);
	if ($iReturn == 0) $iReturn = $DefaultValue;
	return $iReturn;
}

// Takes a variable and checks to see if it's set. 
// Returns the value if set, or the default value if not set.
function ForceSet($InValue, $DefaultValue) {
	if(isset($InValue)) {
		$sReturn = $InValue;
	} else {
		$sReturn = $DefaultValue;
	}
	return $sReturn;
}

// Take a value and force it to be a string.
function ForceString($InValue, $DefaultValue) {
	if (is_string($InValue)) {
		$sReturn = trim($InValue);
		$length = strlen($sReturn);
		if($length == 0) $sReturn = $DefaultValue;
	} else {
		$sReturn = $DefaultValue;
	}
	return $sReturn;
}

function FormatPlural($Number, $Singular, $Plural, $IncludeNumber = "1") {
	$IncludeNumber = ForceBool($IncludeNumber, 0);
	$Return = "";
	if ($Number == 1) {
		$Return = ($IncludeNumber?$Number." ":"").$Singular;
	} else {
		$Return = ($IncludeNumber?$Number." ":"").$Plural;
	}
	return $Return;
}

function GetBasicCheckBox($Name, $Value = 1, $Checked, $Attributes = "") {
	return "<input type=\"checkbox\" name=\"".$Name."\" value=\"".$Value."\" ".(($Checked == 1)?" checked=\"checked\"":"")." $Attributes />";
}

class Error {
	var $AffectedElement;	// The element (class) that has encountered the error
	var $AffectedFunction;	// The function or method that has encountered the error
	var $Message;				// Actual error message
	var $Code;					// Any related code to help identify the error
}

class ErrorManager {
	// Public Variables
	var $StyleSheet;		// A custom stylesheet may be supplied for the error display
	
	// Public, Read Only Variables
	var $ErrorCount;		// Number of errors encountered

	// Private Variables
	var $Errors;			// Collection of error objects
	
	function AddError(&$Context, $AffectedElement, $AffectedFunction, $Message, $Code = "", $WriteAndKill = 1) {
		if ($Context) {
			$Error = $Context->ObjectFactory->NewObject($Context, "Error");
		} else {
			$Error = new Error();
		}
		$Error->AffectedElement = $AffectedElement;
		$Error->AffectedFunction = $AffectedFunction;
		$Error->Message = $Message;
		$Error->Code = $Code;
		$this->Errors[] = $Error;
		$this->ErrorCount += 1;	
		if ($WriteAndKill == 1) $this->Write($Context);
	}
	
	function Clear() {
		$this->ErrorCount = 0;
		$this->Errors = array();
	}
	
	function ErrorManager() {
		$this->Clear();
	}
	
	function Iif($True = "1", $False = "0") {
		if ($this->ErrorCount == 0) {
			return $True;
		} else {
			return $False;			
		}
	}	
	
	function Write(&$Context) {
		echo("<html>
			<head>
			<title>The page could not be displayed</title>
			");
			if ($this->StyleSheet == "") {
				echo("<style>
				body { background: #ffffff; padding: 20px; }
				body, div, h1, h2, h3, h4, p { font-family: Trebuchet MS, tahoma, arial, verdana;  color: #000; line-height: 160%; }
				h1 { font-size: 22px; }
				h2 { color: #c00; font-size: 14px; margin-bottom: 10px; }
				h3, h4, p, .Foot { font-size: 12px; font-weight: normal; margin: 0px; padding: 0px; }
				p { padding-top: 20px; }
				code { display: block; font-size: 11px; padding-left: 10px; padding-right: 10px; background: #f5f5f5; font-family:'courier new',courier,serif; }
				a, a:link, a:visited { color: #36f; background: #ffc; text-decoration: none; }
				a:hover { color: #36F; background: #ffa; text-decoration: none; }
				.Foot { padding-top: 20px; }
				.Sql { font-size: 11px; padding: 8px; background: #f0f0f0; margin-bottom: 6px; }
				</style>
				");
			} else {
				echo("<link rel=\"stylesheet\" href=\"".$this->StyleSheet."\" />\r\n");
			}
			echo("</head>
			<body>
			<h1>A fatal, non-recoverable error has occurred</h1>
			<h2>Technical information (for support personel):</h2>
			");
			for ($i = 0; $i < count($this->Errors); $i++) {
				echo("<h3>Error Message: ".ForceString($this->Errors[$i]->Message, "No error message supplied")."</h3>
					<h4>Affected Elements: ".ForceString($this->Errors[$i]->AffectedElement, "undefined").".".ForceString($this->Errors[$i]->AffectedFunction, "undefined")."();</h4>
					");
				$Code = ForceString($this->Errors[$i]->Code, "");
				if ($Code != "") {
					echo("<p>The error occurred on or near:</p>
						<code>".$Code."</code>
						");
				}
			}
			if ($Context) {
				if ($Context->Mode == agMODE_DEBUG && $Context->SqlCollector) {
					echo("<h2>Database queries run prior to error</h2>");
					$Context->SqlCollector->Write();
				}
			}
			echo("<div class=\"Foot\">For additional support documentation, visit the Lussumo Software support website at: <a href=\"http://lussumo.com/support\">lussumo.com/support</a></div>
			</body>
			</html>");
			// Cleanup
         if ($Context) $Context->Unload();
			die();
	}
	function GetSimple() {
		$sReturn = "";
		for ($i = 0; $i < count($this->Errors); $i++) {
			$sReturn .= ForceString($this->Errors[$i]->Message, "No error message supplied\r\n");
		}
		return $sReturn;
	}
}

class Parameters {
	var $aParameters = array();
	
	// Add an element to the collection
	function Add($Name, $Value, $EncodeValue = 1) {
		if ($EncodeValue && !is_array($Value)) $Value = urlencode($Value);
		$this->aParameters[$Name] = $Value;
 	}
	
	// Completely clear the collection
	function Clear() {
		$this->aParameters = array();
	}
	
	// Return a count of how many elements are in the collection
	function Count() {
		return count($this->aParameters);
	}
	
	// Retrieves all get and post variables
	function DefineCollection($Collection, $ParameterPrefix = "", $IncludeByPrefix = "0", $ExcludeByPrefix = "0") {
		$ParameterPrefix = ForceString($ParameterPrefix, "");
		$IncludeByPrefix = ForceBool($IncludeByPrefix, 0);
		$ExcludeByPrefix = ForceBool($ExcludeByPrefix, 0);
		$Add = 1;
		while (list($key, $value) = each($Collection)) {
			$Add = 1;
			if ($ParameterPrefix != "") {
				$PrefixMatchLocation = strstr($key, $ParameterPrefix);
				// If the prefix isn't found or the location is anywhere other than 0 (the start of the variable name)
				if ($PrefixMatchLocation === false || $PrefixMatchLocation != 0) {
					if ($IncludeByPrefix) $Add = 0;
				} else {
					if ($ExcludeByPrefix) $Add = 0;
				}
			}
			if ($Add) $this->Add($key, $value);
		}		
	}
	
	function GetHiddenInputs() {
		$sReturn = "";
		while (list($key, $val) = each($this->aParameters)) {
			if(is_array($val)) {
				$nmrows = count($val);
				for ($i = 0; $i < $nmrows; ++$i) {
					$sReturn .= "<input type=\"hidden\" name=\"".$key."[]\" value=\"".$val[$i]."\" />\r\n";
				}
			} else {
				$sReturn .= "<input type=\"hidden\" name=\"".$key."\" value=\"".$val."\" />\r\n";
			}
		}
		reset($this->aParameters);
		return $sReturn;
	}
	
	// Return the collection as a string in querystring name/value pair format
	function GetQueryString() {
		$sReturn = "";
		while (list($key, $val) = each($this->aParameters)) {
			if(is_array($val)) {
				$nmrows = count($val);
				for ($i = 0; $i < $nmrows; ++$i) {
					$sReturn .= $key ."[]=" . $val[$i] . "&amp;";
				}
			} else {
				$sReturn .= $key . "=" . $val . "&amp;";
			}
		}
		// remove trailing ampersand
		$sReturn = substr($sReturn,0,strlen($sReturn) - 5);
		if ($sReturn != "") $sReturn = "?".$sReturn;
		reset($this->aParameters);
		return $sReturn;
	}
	
	// Remove an element from the collection
	function Remove($Name) {
		$key_index = array_keys(array_keys($this->aParameters), $Name); 
		if (count($key_index) > 0) array_splice($this->aParameters, $key_index[0], 1);
	}
	// Set a value. If it already exists, overwrite it.
	function Set($Name, $Value, $EncodeValue = 1) {
		$this->Remove($Name);
		$this->Add($Name, $Value, $EncodeValue);
	}
}

class XmlNode {
	var $Name;				// The name of this element as defined by it's xml tag
	var $Type;				// Type of node (1. contains other nodes, 2. contains data)
	var $Attributes;		// Attributes in the current tag element
	var $Value;				// value of the current element
	var $Child;				// Array of child elements
}

class XmlManager {
	var $ErrorManager;	// Error message collector
   var $Name;				// The name of this class
	
	// Searches through the given node to search for a child node with the supplied name
	// returns the node if found, returns false otherwise
	function GetNodeByName($NodeToSearch, $NodeName) {
		$Node = false;
		for ($i = 0; $i < count($NodeToSearch->Child); $i++) {
			if ($NodeToSearch->Child[$i]->Name == $NodeName) $Node = $NodeToSearch->Child[$i];
		}
		return $Node;
	}
	
	function GetNodeValueByName($NodeToSearch, $NodeName) {
		$Node = $this->GetNodeByName($NodeToSearch, $NodeName);
		if ($Node) {
			return $Node->Value;
		} else {
			false;
		}
	} 

	// Takes a string of xml and parses it recursively returning a fully descript root node
	function ParseNode($XmlString) {
		// Retrieve the first xml tag in the file
		$XmlString = trim($XmlString);
		$RootNodeStartTag = strpos($XmlString, "<");
		$RootNodeEndTag = strpos($XmlString, ">");
		$RootNodeName = "";
		$RootNodeAttributes = array();
		$FauxContext = "0";
		
		// If the opening tag exists, parse it out
		if ($RootNodeStartTag === false || $RootNodeEndTag === false) {
			
			$this->ErrorManager->AddError($FauxContext,$this->Name, "ParseNode", "A fatal error occurred while attempting to parse xml nodes. Syntax Error: xml not properly defined.");
		} else {
			$RootNodeName = trim(substr($XmlString, $RootNodeStartTag+1, $RootNodeEndTag-1));
					
			// Evaluate the tag for attributes
			$SpacePosition = strpos($RootNodeName, " ");
			if ($SpacePosition !== false) {
				$sAttributes = trim(substr($RootNodeName,$SpacePosition,strlen($RootNodeName)-$SpacePosition));
				$RootNodeName = trim(substr($RootNodeName,0,$SpacePosition));

				$tmpArray = explode("=",$sAttributes);
				$i = 0;
				$ArrayKeys = count($tmpArray)-1;
				$Name = "";
				while($i < $ArrayKeys) {
					if ($i+1 <= $ArrayKeys) {
						if ($Name == "") $Name = ForceString($tmpArray[$i],"");
						$Value = ForceString($tmpArray[$i+1],"");
						if (strpos($Value,"\"") === 0) $Value = substr($Value,1);
						$NextQuotePosition = strpos($Value,"\"");
						$NextName = "";
						if ($NextQuotePosition !== false) {
							$NextName = trim(substr($Value,$NextQuotePosition));
							$Value = substr($Value,0,$NextQuotePosition);
						}
						$RootNodeAttributes[$Name] = $Value;
						$Name = $NextName;
					}
					$i += 2;
				}
			}
		}
		
		// Double check to see that the root tag name has been properly defined
		if ($RootNodeName == "") $this->ErrorManager->AddError($FauxContext,$this->Name, "ParseNode", "Node name not defined.");
		
		$Node = new XmlNode();
		$Node->Name = $RootNodeName;
		$Node->Attributes = $RootNodeAttributes;
		
		// Get content from within the root tag
		$RootNodeStartCloseTag = strpos($XmlString,"</".$RootNodeName.">");
		$XmlString = substr($XmlString, $RootNodeEndTag+1, $RootNodeStartCloseTag-$RootNodeEndTag-1);
		
		// Check the inner content to define the current node type
		if (strpos($XmlString, "<") !== false && strpos($XmlString, ">") !== false) {
			$Node->Type = XmlNodeTypeContainer;
		} else {
			$Node->Type = XmlNodeTypeContent;
		}		
		
		if ($Node->Type == XmlNodeTypeContent) {
			// If the current node holds content, return it
			$Node->Value = $XmlString;		
		} else {
			// If the current node contains more nodes, parse it
			// Define nodes until entire xmlstring has been handled at this level
			$HandlerComplete = false;
			while(!$HandlerComplete) {
				// Defind the node name
				$NodeStartOpenTag = strpos($XmlString, "<");
				$NodeEndOpenTag = strpos($XmlString, ">");
				$NodeName = trim(substr($XmlString, $NodeStartOpenTag+1, $NodeEndOpenTag-1-$NodeStartOpenTag));
				
				// Check the Node Name for any spaces and remove anything if it exists
				$SpacePosition = strpos($NodeName," ");
				if ($SpacePosition !== false) $NodeName = substr($NodeName, 0, $SpacePosition);
				
				// Find the position of the closing tag for this node
				$NodeStartCloseTag = strpos($XmlString,"</".$NodeName.">");
				$NodeEndCloseTag = $NodeStartCloseTag+strlen($NodeName)+3;
				
				// If it wasn't found, throw an error and break the loop
				if ($NodeStartCloseTag === false) {
					$this->ErrorManager->AddError($FauxContext,$this->Name, "ParseNode", "Closing tag for \"$NodeName\" node not defined.");
					break;
				// If the tag was found, return everything from the beginning to the end and parse it into a child
				} else {
					$NewXmlNodeString = substr($XmlString,$NodeStartOpenTag,$NodeEndCloseTag);
					$Node->Child[] = $this->ParseNode($NewXmlNodeString);					
				}

				if (strlen($XmlString) > $NodeEndCloseTag) {
					$XmlString = trim(substr($XmlString, $NodeEndCloseTag, strlen($XmlString)));
				} else {
					$XmlString = "";
				}
				if ($XmlString == "") $HandlerComplete = true;
			}
		}
		return $Node;
	}
	
	function XmlManager() {
		$this->Name = "XmlManager";
	}
}

class File {
	var $Name;
	var $Extension;
	var $Path;					// Directory path to the file
	var $Body;
	var $Size;
}

class FileManager {
	var $ErrorManager;
	var $Name;
	
	function FileExtension($File) {
		if (strstr($File->Name, '.')) {
			return substr(strrchr($File->Name, '.'), 1, strlen($File->Name));
		} else {
			return "";
		}
	}

	function FileManager() {
		$this->Name = "FileManager";
	}

	function FilePath($File) {
		if (substr($File->Path, strlen($File->Path) - 1, strlen($File->Path)) != "/") $File->Path .= "/";
		return $File->Path.$File->Name;
	}
	
	function Get($File) {
		// Ensure required properties are set
      $FauxContext = 0;
		if ($File->Name == "") $this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "You must supply a file name.", "", 0);
		if ($File->Path == "") $this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "You must supply a file path.", "", 0);
		if ($this->ErrorManager->ErrorCount == 0) {
			$File->Extension = $this->FileExtension($File);
			$FilePath = $this->FilePath($File);
			$FileHandle = @fopen($FilePath, "r");
			if (!$FileHandle) {
				$this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "The file could not be opened.", $FilePath, 0);
			} else {
				$File->Size = filesize($FilePath);
				$File->Body = @fread($FileHandle, $File->Size);
				if (!$File->Body) $this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "The file could not be read.", "", 0);
				@fclose($FileHandle);
			}
		}
		return $this->ErrorManager->Iif($File, false);
	}
}

function CurrentUrl() {
   return basename(ForceString(@$_SERVER["PHP_SELF"], ""));
}

function CurrentWebPath() {
   $SelfWebPath = ForceString(@$_SERVER["HTTP_HOST"], "").ForceString(@$_SERVER["PHP_SELF"], "");
   // Strip filename from webpath if exists
   if (strpos($SelfWebPath, CurrentUrl()) !== false) $SelfWebPath = substr($SelfWebPath,0,strpos($SelfWebPath, CurrentUrl()));
   if ($SelfWebPath != "") $SelfWebPath = "http://".$SelfWebPath;
   return $SelfWebPath;
}

function FilePath($Path, $File) {
   if (substr($Path, strlen($Path) - 1, strlen($Path)) != "/") $Path .= "/";
   return $Path.$File;
}	

function FormatDisplayedItem($ItemID, $FileName, $FileSize, $HandlerMethod, &$Params, $Config) {
   $FolderPath = substr($Config->CurrentBrowsingDirectory, strlen($Config->CurrentWorkingDirectory)+1,(strlen($Config->CurrentBrowsingDirectory)-strlen($Config->CurrentWorkingDirectory)+1));
   $FolderPath = ($FolderPath != "")?$FolderPath."/".$FileName:$FileName;
   $EncodedPath = EncodeLinkUrl(FilePath(CurrentWebPath(),$FolderPath));
   
   $Params->Add("gid", $ItemID);
   $Return = "<input type=\"hidden\" name=\"Item$ItemID\" value=\"".$EncodedPath."\" />
      <div class=\"DisplayItem\">
         <div class=\"DisplayItemUrl\"><a href=\"".CurrentWebPath().$FolderPath."\">$FileName</a></div>
         <ul class=\"DisplayItemOptions\">
            <li class=\"Save\"><a href=\"".CurrentUrl().$Params->GetQueryString()."\">Save</a></li>
            <li class=\"Copy\"><a href=\"Javascript:copy(document.frmLinkContainer.Item$ItemID);\">Copy url</a></li>\r\n";
   $Handled = false;
   $Params->Remove("gid");

   switch ($HandlerMethod) {
      case "Image":
         $Handled = true;
         $Return .= "<input type=\"hidden\" name=\"ImgTag$ItemID\" value='<img src=\"".$EncodedPath."\" />' />
               <li class=\"CopyImg\"><a href=\"Javascript:copy(document.frmLinkContainer.ImgTag$ItemID);\">Copy img tag</a></li>
            </ul>
            <div class=\"DisplayItemImage\">";
         if ($Config->FitImagesToPage) {
            $ImageSize = @getimagesize($FolderPath);
            if ($ImageSize) {
               $Return .= "<script>writeImage('$EncodedPath', ".$ImageSize[0].", ".$ImageSize[1].", '".$ItemID."');</script>";
            } else {
               $Return .= "<img src=\"$EncodedPath\" />";
            }
         } else {
            $Return .= "<img src=\"$EncodedPath\" />";
         }
         $Return .= "</div>\r\n";
         break;
      case "IFrame":
         $Handled = true;
         $Return .= "<li class=\"CopyImg\"><a href=\"Javascript:copy(document.frmLinkContainer.AnchorTag$ItemID);\">Copy anchor tag</a></li>
            <input type=\"hidden\" name=\"AnchorTag$ItemID\" value=\"<a href='".$EncodedPath."'>".CurrentWebPath().$FolderPath."</a>\" />
            <li class=\"View\"><a href=\"".CurrentWebPath().$FolderPath."\" target=\"_blank\">View</a></li>
            </ul>
         <div class=\"DisplayItemIFrame\"><iframe src=\"$FolderPath\"></iframe></div>\r\n";
         break;
      case "TextArea":
         $Handled = true;
         // Retrieve the file contents
         $File = new File();
         $File->Name = $FolderPath;
         $File->Path = "./";
         $FileManager = new FileManager();
         $FileManager->ErrorManager = &$Config->ErrorManager;
         $File = $FileManager->Get($File);
         if (!$File) {
            $FauxContext = "0";
            $Config->ErrorManager->AddError($FauxContext,"Filebrowser", "FormatDisplayedItem", "An error occurred while retrieving the file contents.", "", 0);
            $FileContents = $Config->ErrorManager->GetSimple();
         } else {
            // Make sure that a "</textarea>" tag doesn't kill my textarea
            $FileContents = str_replace("<", "&#60;", $File->Body);
         }
         $Return .= "<li class=\"CopyImg\"><a href=\"Javascript:copy(document.frmLinkContainer.AnchorTag$ItemID);\">Copy anchor tag</a></li>
            <input type=\"hidden\" name=\"AnchorTag$ItemID\" value='<a href=\"".$EncodedPath."\">".CurrentWebPath().$FolderPath."</a>' />
            <li class=\"View\"><a href=\"".CurrentWebPath().$FolderPath."\" target=\"_blank\">View</a></li>
            </ul>
         <div class=\"DisplayItemTextArea\"><textarea>$FileContents</textarea></div>\r\n";
         break;
      case "EmbedFlash":
         $Handled = true;
         $EmbedString = "<object type=\"application/x-shockwave-flash\" data=\"".$EncodedPath."\"";
         if ($Config->PluginHeight > 0 && $Config->PluginWidth > 0) $EmbedString .= " height=\"".$Config->PluginHeight."\" width=\"".$Config->PluginWidth."\"";
         $EmbedString .= "><param name=\"movie\" value=\"".$EncodedPath."\" />You do not appear to have the latest flash plugin installed</object>";
         
         $Return .= "<li class=\"CopyImg\"><a href=\"Javascript:copy(document.frmLinkContainer.EmbedTag$ItemID);\">Copy embed tag</a></li>
            <input type=\"hidden\" name=\"EmbedTag$ItemID\" value='".$EmbedString."' />
            </ul>
            <div class=\"DisplayItemFlash\">".$EmbedString."</div>\r\n";			
         break;
      case "Embed":
         $Handled = true;
         $EmbedString = "<embed src='".CurrentWebPath().$FolderPath."'></embed>";
         $Return .= "<li class=\"CopyImg\"><a href=\"Javascript:copy(document.frmLinkContainer.EmbedTag$ItemID);\">Copy embed tag</a></li>
            <input type=\"hidden\" name=\"EmbedTag$ItemID\" value=\"".$EmbedString."\" />
            </ul>
         <div class=\"DisplayItemEmbed\">".$EmbedString."</div>\r\n";
         break;
      case "EmbedQuicktime":
         $Handled = true;
         $EmbedString = "<embed src='".$EncodedPath."'";
         if ($Config->PluginHeight > 0 && $Config->PluginWidth > 0) $EmbedString .= " height='".$Config->PluginHeight."' width='".$Config->PluginWidth."'";
         $EmbedString .= "></embed>";
         $Return .= "<li class=\"CopyImg\"><a href=\"Javascript:copy(document.frmLinkContainer.EmbedTag$ItemID);\">Copy embed tag</a></li>
            <input type=\"hidden\" name=\"EmbedTag$ItemID\" value=\"".$EmbedString."\" />
            </ul>
         <div class=\"DisplayItemEmbed\">".$EmbedString."</div>\r\n";
         break;
      default: 
         // HyperLink handler method
         $Return .= "</ul>
         <div class=\"DisplayItemBlank\"></div>\r\n";
         $Handled = true;
         break;
   }
   if (!$Handled) {
      $Return = "";
   } else {
      $Return .= "</div>\r\n";
   }
   return $Return;
}	

function FormatListItem($ID, $Name, $Path, $Size, $Date, $Highlighted, &$Params, $CurrentFileHasThumbnail, $Config) {
   $Return = "<div class=\"".($Config->UseThumbnails?"ThumbedListItem":"ListItem")."\">";
   $Params->Set("fid",$ID);
   if ($Config->UseThumbnails) {
      if ($CurrentFileHasThumbnail) {
         $ThumbPath = EncodeLinkUrl(FilePath($Path, "_thumb.".$Name));
         $Return .= "<div class=\"ItemThumb\">"
            ."<a href=\"".CurrentUrl().$Params->GetQueryString()."\" style=\"background:url('".$ThumbPath."') center center no-repeat;\">"
            ."<img src=\"".$ThumbPath."\" border=\"0\" /></a>"
            ."</a>"
            ."</div>";
      } else {
         $Return .= "<div class=\"ItemThumb\">"
            ."<a href=\"".CurrentUrl().$Params->GetQueryString()."\">"
            ."<div class=\"NoPreview\">Preview Not Available</div>"
            ."</a>"
            ."</div>";
      }
   }
   $Return .= "<div class=\"ItemName\">\r\n";
   if (!$Highlighted) {
      $Return .= "<a href=\"".CurrentUrl().$Params->GetQueryString()."\">$Name</a>";
   } else {
      $Return .= $Name;
   }
   $Return .= "</div>
      <div class=\"ItemSize\">$Size</div>
      <div class=\"ItemDateModified\">".date($Config->DateFormat, $Date)."</div>
      </div>\r\n";
   return $Return;
}
function FormatMenuItem($Id, $Params, $Link, $Alt, $Active) {
   $Return = "<li id=\"$Id\">";
   if ($Active !== false) $Return .= "<a href=\"".CurrentUrl().$Params->GetQueryString()."\" title=\"$Alt\">";
   $Return .= $Link;
   if ($Active !== false) $Return .= "</a>";
   $Return .= "</li>\r\n";
   return $Return;
}

// Append a folder name to the current browsing directory
function AppendFolder($RootPath, $FolderToAppend) {
	if (substr($RootPath, strlen($RootPath)-1, strlen($RootPath)) == "/") $RootPath = substr($RootPath, 0, strlen($RootPath) - 1);
	if (substr($FolderToAppend,0,1) == "/") $FolderToAppend = substr($FolderToAppend,1,strlen($FolderToAppend));
	return $RootPath."/".$FolderToAppend;
}

// Build the navigation path to the current browsing directory
function BuildPath($FolderNavigator, $FilesPerPage = "10") {
	$s = "";
	for ($i = 0; $i < count($FolderNavigator); $i++) {
		$s .= "/<a href=\"".CurrentUrl()."?fpp=".$FilesPerPage."&did=".$FolderNavigator[$i][1]."\">".$FolderNavigator[$i][0]."</a>";
	}
	return $s;
}
function BuildLiteralPath($FolderNavigator) {
	$s = "";
	for ($i = 0; $i < count($FolderNavigator); $i++) {
		$s .= "/".$FolderNavigator[$i][0];
	}
	return $s;
}

// returns the complete path to the folder or false if not found
function CheckForFolder($Path, $FolderKey, &$Config) {
	$FolderHandle = opendir($Path);
	$aCurrentSubFolders = array();
   // Only look at folders
	while (false !== ($Item = readdir($FolderHandle))) {
		if ($Item != '.'
         && $Item != '..'
         && is_dir($Path."/".$Item)
         && !in_array($Path."/".$Item, $Config->FullyQualifiedHideFiles)) $aCurrentSubFolders[] = $Item;
	}
	closedir($FolderHandle);
   // Sort the folders according to the config setting
   usort($aCurrentSubFolders, "strcasecmp");
   reset($aCurrentSubFolders);
   if ($Config->SortDirection == "desc") $aCurrentSubFolders = array_reverse($aCurrentSubFolders);   
   
	// If the key supplied is less than the total count of folders found, append the folder name to the path
	if ($FolderKey < count($aCurrentSubFolders)) {
		$Config->FolderNavigatorLocation = FormatDelimitedString($Config->FolderNavigatorLocation, $FolderKey, $Config->FolderDelimiter);
		$Config->FolderNavigator[] = array($aCurrentSubFolders[$FolderKey], $Config->FolderNavigatorLocation);
		return AppendFolder($Path, $aCurrentSubFolders[$FolderKey]);
	} else {
		return false;
	}
}

function EncodeLinkUrl($Url) {
	return str_replace("'", "%27", $Url);
}
function FormatDelimitedString($String, $Addition, $Delimiter) {
	$String = $String."";
	$Addition = $Addition."";
	$String = trim($String);
	$StringLength = strlen($String);
	if ($String != "") {
		if (substr($String,0,1) == $Delimiter) $String = substr($String, 1, $StringLength-1);
		if (substr($String,$StringLength-1,$StringLength) == $Delimiter) $String = substr($String, 0, $StringLength-1);
	}
	$Addition = ForceString($Addition, "");
	$AdditionLength = strlen($Addition);
	if ($Addition != "") {
		if (substr($Addition,0,1) == $Delimiter) $Addition = substr($Addition, 1, $AdditionLength-1);
		if (substr($Addition,$AdditionLength-1,$AdditionLength) == $Delimiter) $Addition = substr($Addition, 0, $AdditionLength-1);
	}
   $sReturn = "";
	if ($String != "" && $Addition != "") {
		$sReturn = $String.$Delimiter.$Addition;
	} elseif ($String != "" && $Addition == "") {
		$sReturn = $String;
	} elseif ($String == "" && $Addition != "") {
		$sReturn = $Addition;
	}
   
   return $sReturn;
}
function FormatFileSize($FileSize) {
	if ($FileSize > 1048576) {
		return intval((($FileSize / 1048576) * 100) + 0.5) / 100 ."mb";
	} elseif ($FileSize > 1024) {
		return ceil($FileSize / 1024)."kb";
	} else {
		return $FileSize."b";
	}
}
// strip the file extension from a file name
function GetExtension($FileName) {
	if (strstr($FileName, '.')) {
		return strtolower(substr(strrchr($FileName, '.'), 1, strlen($FileName)));
	} else {
		return "";
	}
}

class FileCollection {

	var $Name;		// Name of the current collection
	var $FileNames;		// Array of file names
	var $LowerFileNames;// Array of file names in lowercase (for sorting)
	var $FileSizes;		// Array of file sizes
	var $FileDates;		// Array of file dates
	var $HandlerMethods;// Array of handler methods
	
	function AddFile($Name, $Size, $Date, $HandlerMethod) {
		$this->FileNames[] = $Name;
		$this->LowerFileNames[] = strtolower($Name);
		$this->FileSizes[] = $Size;
		$this->FileDates[] = $Date;
		$this->HandlerMethods[] = $HandlerMethod;
	}
	
	function BuildAssociativeFileArray($OrderedArray, $ThumbnailArray) {
		reset($OrderedArray);
		$AssociativeArray = array();
		while (list($key, $val) = each($OrderedArray)) {
			$AssociativeArray[] = array("Name" => $this->FileNames[$key], "Size" => FormatFileSize($this->FileSizes[$key]), "Date" => $this->FileDates[$key], "HandlerMethod" => $this->HandlerMethods[$key], "ThumbnailPresent" => $this->FindThumbnail($this->FileNames[$key], $ThumbnailArray));
		}
		return $AssociativeArray;
	}
	
	function FileCollection($Name = "") {
		$this->Name = $Name;
		$this->FileNames = array();
		$this->LowerFileNames = array();
		$this->FileDates = array();
		$this->FileSizes = array();
		$this->HandlerMethods = array();
	}
	
	function FindThumbnail($FileName, $ThumbnailArray) {
		// Take the given filename and look for a thumbnail (thumbnails are prefixed with ".thumb.")
		return in_array("_thumb.".$FileName, $ThumbnailArray);
	}
	
	// Get all items in this file collection as an associative array in the specified order & direction
	function GetFiles($OrderBy = "Size", $Direction = "asc", $ThumbnailArray = "") {
		if (!is_array($ThumbnailArray)) $ThumbnailArray = array();
		if ($Direction != "asc") $Direction = "desc";
		if ($OrderBy != "Size" && $OrderBy != "Name" && $OrderBy != "Date") $OrderBy = "Size";
		
		$SortFunction = "asort";
		if ($Direction == "desc") $SortFunction = "arsort";
		
		$ReturnArray = false;
		
		if ($OrderBy == "Date") {
			$SortFunction($this->FileDates);
			$ReturnArray = $this->BuildAssociativeFileArray($this->FileDates, $ThumbnailArray);
		} elseif ($OrderBy == "Name") {
			$SortFunction($this->LowerFileNames);
			$ReturnArray = $this->BuildAssociativeFileArray($this->LowerFileNames, $ThumbnailArray);
		} else {
			$SortFunction($this->FileSizes);
			$ReturnArray = $this->BuildAssociativeFileArray($this->FileSizes, $ThumbnailArray);
		}
		return $ReturnArray;
	}
	
}

class Configuration {
	// Configuration Settings
	var $ConfigFile;  			// Location of the configuration file
	var $FileTypesFile;			// Location of the filetypes file
	var $ErrorManager;			// Handles error messages
	var $Version;	   			// FB Version
	var $Developer;				// FB Developer's name
	var $DeveloperEmail; 		// FB Developer's email address
	var $Date;				   	// Date of FB development completion
	var $StyleUrl;			   	// URL to the stylesheet
	var $PageTitle;				// To appear on the page
	var $PageIntroduction;		// To appear before any images are viewed
	var $UsePageIntroductionInSubFolders;
	var $DisplayHiddenFiles;	// Boolean value indicating if files beginning with underscore should be visible
	var $BrowseSubFolders;		// Boolean value indicating if subfolders should be browsable/visible
	var $SortBy;			   	// Value to sort the files by
	var $SortDirection;			// Direction to sort the files
	var $DateFormat;			   // The format string that will be used to configure the display format of the date for a file
	var $PluginHeight;
	var $PluginWidth;
	var $DefaultFilesPerPage;	// The default number of files to show when someone clicks the >> or << buttons
	var $FitImagesToPage;		// Boolean value indicating if large images should be shrunk to fit on the page
   var $UseThumbnails;			// Use thumbnails (if they exist)
	
	// Browsing Properties
	var $FileID;				   // ID of file currently being viewed
	var $FolderIDs;				// String of comma delimited folder ids
	var $aFolderID;				// Array of folder id's currently being viewed
	var $FilesPerPage;			// Number of files to display per page (as defined by the querystring)
	var $CurrentWorkingDirectory;
	var $CurrentBrowsingDirectory;
	var $SelfUrl;			   	// Name of this file
	var $SelfWebPath;			   // path to the filebrowser execution file (ie. http://mydomain.com/images/)
	var $FolderDelimiter;		// Querystring delimiter to be used between folder ids
	var $FolderNavigator;		// A holder variable containing a folder navigation array
	var $FolderNavigatorLocation;	// Another holder variable containing the querystring values for the folder navigator	
	var $ShowMultipleFiles;		// Boolean value indicating if multiple file should be displayed or not
	var $GetFileID;				// ID of a file to "save as"
   var $HideFiles;				// An array of files that should remain hidden
   var $FullyQualifiedHideFiles; // Same as above, but fully qualified to root
	
   var $Name;					   // The name of this class
	
	
	// Default constructor - define default values for class properties
	function Configuration() {
		// Configuration Settings
		$this->ConfigFile = "_config.xml";
		$this->FileTypesFile = "_filetypes.xml";
		$this->CurrentWorkingDirectory = getcwd();
		
		// Configuration Properties
		$this->Version = "1.3.0";
		$this->Developer = "Mark O'Sullivan";
		$this->Date = "2002-2005"; 
		$this->StyleUrl = "_default.css";
		$this->PageTitle = "Lussumo Filebrowser";
		$this->PageIntroduction = "";
		$this->UsePageIntroductionInSubFolders = false;
		$this->DisplayHiddenFiles = false;
		$this->BrowseSubFolders = true;
		$this->SortBy = "Name";
		$this->SortDirection = "asc";
		$this->DateFormat = "m-d-y";
		$this->PluginHeight = 400;
		$this->PluginWidth = 400;
		$this->DefaultFilesPerPage = 5;
		$this->MaxFilesPerPage = 50;
		$this->FitImagesToPage = 1;
		$this->UseThumbnails = 0;
		$this->HideFiles = array();
		$this->FullyQualifiedHideFiles = array();
		
		// Browsing Properties
		$this->FolderDelimiter = "-";
		$this->FileID = ForceIncomingInt("fid", 0);
		$this->FolderIDs = ForceIncomingString("did", "");
		if ($this->FolderIDs == "") {
			$this->aFolderID = array();
		} else {
			$this->aFolderID = explode($this->FolderDelimiter, $this->FolderIDs);
		}
		$this->CurrentBrowsingDirectory = $this->CurrentWorkingDirectory;
		$this->FolderNavigator = array();
		$this->FolderNavigatorLocation = "";
		$this->ShowMultipleFiles = ForceIncomingBool("smf", false);
		$this->GetFileID = ForceIncomingInt("gid", 0);
		
		$this->Name = "FileBrowser";
	}

	function RetrieveConfigurationPropertiesFromXml($Path) {
		$FauxContext = "0";
		if ($this->ConfigFile == "") $this->ErrorManager->AddError($FauxContext,$this->Name, "RetrieveConfigurationPropertiesFromXml", "You must supply a path to the configuration file");
		// Retrieve config file contents
		$File = new File();
		$File->Name = $this->ConfigFile;
		$File->Path = $Path;
		$FileManager = new FileManager();
		$FileManager->ErrorManager = &$this->ErrorManager;
		$File = $FileManager->Get($File);
		// If there were errors retrieving the config file and we're in the CWD, report an error
		if ($this->ErrorManager->ErrorCount > 0 && $Path == $this->CurrentWorkingDirectory) {
			$this->ErrorManager->Clear();
			$this->ErrorManager->AddError($FauxContext,$this->Name, "RetrieveConfigurationPropertiesFromXml", "The root configuration file could not be found/read (_config.xml).");
		// If failed to retrieve the file from a non-root directory, 
		// just accept the root file
		} elseif ($this->ErrorManager->ErrorCount > 0) {
			$this->ErrorManager->Clear();
		// If no errors occurred, continue to retrieve new configuration settings
		} else {
			// Create an XML Parser to retrieve configuration settings
			$XMan = new XmlManager();
			$XMan->ErrorManager = &$this->ErrorManager;
			$MyConfig = $XMan->ParseNode($File->Body);
			if ($MyConfig && $this->ErrorManager->ErrorCount == 0) {
				$this->StyleUrl = $XMan->GetNodeValueByName($MyConfig, "StyleUrl");
				$this->PageTitle = $XMan->GetNodeValueByName($MyConfig, "PageTitle");
				$this->PageIntroduction = $XMan->GetNodeValueByName($MyConfig, "PageIntroduction");
				$this->PageIntroduction = str_replace("[","<", $this->PageIntroduction);
				$this->PageIntroduction = str_replace("]",">", $this->PageIntroduction);
				$this->PageIntroduction = str_replace("\n","<br />", $this->PageIntroduction);
				$this->DisplayHiddenFiles = $XMan->GetNodeValueByName($MyConfig, "DisplayHiddenFiles");
				$this->BrowseSubFolders = $XMan->GetNodeValueByName($MyConfig, "BrowseSubFolders");
				$this->SortBy = $XMan->GetNodeValueByName($MyConfig, "SortBy");
				$this->SortDirection = $XMan->GetNodeValueByName($MyConfig, "SortDirection");
				$this->DateFormat = $XMan->GetNodeValueByName($MyConfig, "DateFormat");
				$this->UsePageIntroductionInSubFolders = ForceBool($XMan->GetNodeValueByName($MyConfig, "UsePageIntroductionInSubFolders"), false);
				$this->PluginHeight = ForceInt($XMan->GetNodeValueByName($MyConfig, "PluginHeight"), $this->PluginHeight);
				$this->PluginWidth = ForceInt($XMan->GetNodeValueByName($MyConfig, "PluginWidth"), $this->PluginWidth);
				$this->FilesPerPage = ForceIncomingInt("fpp", ForceInt($XMan->GetNodeValueByName($MyConfig, "FilesPerPage"), $this->FilesPerPage));
				$this->MaxFilesPerPage = ForceInt($XMan->GetNodeValueByName($MyConfig, "MaxFilesPerPage"), $this->MaxFilesPerPage);
				$this->FitImagesToPage = ForceBool($XMan->GetNodeValueByName($MyConfig, "FitImagesToPage"), $this->FitImagesToPage);
				$this->UseThumbnails = ForceBool($XMan->GetNodeValueByName($MyConfig, "UseThumbnails"), $this->UseThumbnails);
				$this->HideFiles = explode(",", $XMan->GetNodeValueByName($MyConfig, "HideFiles"));
				for ($i = 0; $i < count($this->HideFiles); $i++) {
					$this->FullyQualifiedHideFiles[] = $this->CurrentBrowsingDirectory."/".$this->HideFiles[$i];
				}
			} 
		}
		return $this->ErrorManager->Iif();
	}
}

class Thumbnailer {
	// Configuration Settings
	var $ConfigFile;			// Location of the configuration file
	var $ErrorManager;			// Handles error messages
	var $Version;				// TN Version
	var $Developer;				// TN Developer's name
	var $DeveloperEmail;		// TN Developer's email address
	var $Date;					// Date of TN development completion
	var $StyleUrl;				// URL to the stylesheet
	var $SortBy;				// Value to sort the files by
	var $SortDirection;			// Direction to sort the files
	var $DateFormat;			// The format string that will be used to configure the display format of the date for a file
	var $ThumbHeight;			// The height of the generated thumbnails
	var $ThumbWidth;			// The width of the generated thumbnails
	var $CropThumbnails;		// Boolean value indicating if the thumbnails should be cropped to fit the thumb 
								// dimensions (above), or not cropped and the dimensions are treated as maximums 
								// (images retain their aspect ratio).
	
	// Browsing Properties
	var $FolderIDs;				// String of comma delimited folder ids
	var $aFolderID;				// Array of folder id's currently being viewed
	var $CurrentWorkingDirectory;
	var $CurrentBrowsingDirectory;
	var $SelfUrl;				// Name of this file
	var $SelfWebPath;			// Path to the Thumbnailer execution file (ie. http://mydomain.com/images/)
	var $FolderDelimiter;		// Querystring delimiter to be used between folder ids
	var $FolderNavigator;		// A holder variable containing a folder navigation array
	var $FolderNavigatorLocation;	// Another holder variable containing the querystring values for the folder navigator	
	
	var $Name;					// The name of this class
   var $ThumbnailableFormats;	// array of file formats that can be thumbnailed
   var $FolderList;
	var $FileList;
	var $ThumbPrefix;
	
   var $HideFiles;				// An array of files that should remain hidden
   var $FullyQualifiedHideFiles; // Same as above, but fully qualified to root
	
	// Private
	var $FolderCollection;
	var $ImageCollection;

	
	function DefineBrowsingDirectory() {
		$this->RetrieveConfigurationPropertiesFromXml($this->CurrentWorkingDirectory);
		
		// Check for subfolder ids if 
		if (count($this->aFolderID) > 0) {
			for ($i = 0; $i < count($this->aFolderID); $i++) {
				$CurrentFolderKey = ForceInt($this->aFolderID[$i], 0);
				$this->CurrentBrowsingDirectory = CheckForFolder($this->CurrentBrowsingDirectory, $CurrentFolderKey, $this);
				if (!$this->CurrentBrowsingDirectory) {
					// IF the current browsing directory wasn't found, wipe out all directory settings and start from the root
					$this->CurrentBrowsingDirectory = $this->CurrentWorkingDirectory;
					$this->FolderIDs = "";
					$this->aFolderID = array();
					break;
				}
			}
		}
	}
	
	// The main method which will define and write the entire file browser
	function DefineProperties() {
		$this->DefineBrowsingDirectory();
		
		// Create some holder variables
		$this->FolderCollection = array();
		$this->ImageCollection = new FileCollection();
		$ThumbnailCollection = array();

		// RETRIEVE FILES
		// Loop through files in the current browsing directory
		$FolderKey = 0;
		$FolderHandle = opendir($this->CurrentBrowsingDirectory);
		$CurrentExtension = "";
		$RecordItem = true;
		while (false !== ($Item = readdir($FolderHandle))) {
			$RecordItem = true;
			if ($Item == "."
				 || $Item == ".."
				 || $Item == $this->SelfUrl
		       || in_array($this->CurrentBrowsingDirectory."/".$Item, $this->FullyQualifiedHideFiles)
			) $RecordItem = false;
			
			if ($RecordItem) {
				// If dealing with a folder, add it to the folder collection
				if (is_dir($this->CurrentBrowsingDirectory."/".$Item)) {
					$this->FolderCollection[] = $Item;
				// If not dealing with a folder, add it to the proper file collection
				} elseif (substr($Item,0,7) == $this->ThumbPrefix) {
					$ThumbnailCollection[] = $Item;
				} elseif (substr($Item,0,1) == "_") {
					// Ignore "hidden" files
				} elseif (in_array($this->GetFileType($this->CurrentBrowsingDirectory, $Item), $this->ThumbnailableFormats)) {
					$this->ImageCollection->AddFile($Item, filesize($this->CurrentBrowsingDirectory."/".$Item), filemtime($this->CurrentBrowsingDirectory."/".$Item), "");
				}
			}
		}
	
		// BUILD THE PAGE ELEMENTS
		$ThumbedList = "";
		$NonThumbedList = "";
		
		// Create a parameters class to manage querystring values
		$Params =  new Parameters();
		$Params->DefineCollection($_GET);
		$Params->Remove("smf");
		if ($this->FolderIDs == "") $Params->Remove("did");
	
		$FileCounter = 0;
		
		// Build the file listing
		// Get the sorted files
		$Files = $this->ImageCollection->GetFiles($this->SortBy, $this->SortDirection, $ThumbnailCollection);
		$ThumbBool = 0;
		$NonThumbBool = 0;
		if (count($Files) > 0) {
			for ($j = 0; $j < count($Files); $j++) {
				$FileCounter += 1;
				$CurrentFileName = $Files[$j]["Name"];
				$CurrentFileSize = $Files[$j]["Size"];
				$CurrentFileDate = $Files[$j]["Date"];
				$CurrentFileHandlerMethod = $Files[$j]["HandlerMethod"];
				
				if ($Files[$j]["ThumbnailPresent"]) {
					$ThumbedList .= $this->FormatListItem($FileCounter, $CurrentFileName, $CurrentFileSize, $CurrentFileDate, $Params, $ThumbBool);
					$ThumbBool = FlipBool($ThumbBool);
				} else {
					$NonThumbedList .= $this->FormatListItem($FileCounter, $CurrentFileName, $CurrentFileSize, $CurrentFileDate, $Params, $NonThumbBool);
					$NonThumbBool = FlipBool($NonThumbBool);
				}
				
			}
		}
		if ($NonThumbedList != "") $NonThumbedList = $this->FormatImageList($NonThumbedList, "Images Without Thumbnails", "Images");
		if ($ThumbedList != "") $ThumbedList = $this->FormatImageList($ThumbedList, "Images With Thumbnails", "ThumbedImages");
		
		$this->FileList = $NonThumbedList.$ThumbedList;
		
		// Define the current folder path
		$RootPath = substr($this->SelfWebPath,0,strlen($this->SelfWebPath)-1);
		$CurrentPath = "<a href=\"".$RootPath."/".$this->SelfUrl."\">".str_replace("http://","",$RootPath)."</a>";
		
		$this->FolderList = "<div class=\"Container Folders\">
			<dl class=\"CurrentFolder\">
				<dt>Current Folder</dt>
				<dd>".$CurrentPath.BuildPath($this->FolderNavigator, $this->SelfUrl, 0)."</dd>
			</dl>";
		
		// Build the folder listing
		if (count($this->FolderCollection) > 0 || count($this->aFolderID) > 0) {

			// Sort the folders
			usort($this->FolderCollection, "strcasecmp");
			reset($this->FolderCollection);
			if ($this->SortDirection == "desc") $this->FolderCollection = array_reverse($this->FolderCollection);
			
			$Params->Remove("fid");
				$this->FolderList .= "<h2>Folders</h2>
				<ul class=\"FolderList\">\r\n";
				
			// Display the updirectory link if necessary
			if (count($this->aFolderID) > 0) {
				$ParentFolder = "";
				if (count($this->aFolderID) > 1) {
					for ($i = 0; $i < count($this->aFolderID)-1; $i++) {
						$ParentFolder  = FormatDelimitedString($ParentFolder, $this->aFolderID[$i], $this->FolderDelimiter);
					}
					$Params->Set("did", $ParentFolder);
				} else {
					$Params->Remove("did");
				}
				$this->FolderList .= "<li><a href=\"".$this->SelfUrl.$Params->GetQueryString()."\">Parent Folder</a></li>\r\n";
			}				
				
			// Add actual folders
			for ($i = 0; $i < count($this->FolderCollection); $i++) {
				$Params->Set("did",FormatDelimitedString($this->FolderIDs,$i,$this->FolderDelimiter));
				$this->FolderList .= "<li><a href=\"".$this->SelfUrl.$Params->GetQueryString()."\">".$this->FolderCollection[$i]."</a></li>\r\n";
			}
			$this->FolderList .= "</ul>";
		}
		$this->FolderList .= "</div>";
	}

	function FilePath($Path, $File) {
		if (substr($Path, strlen($Path) - 1, strlen($Path)) != "/") $Path .= "/";
		return $Path.$File;
	}	
	
	function FormatImageList($List, $Title, $Name) {
		$p = new Parameters();
		$ExcludeByPrefix = "ImageID";
		$p->DefineCollection($_GET, $ExcludeByPrefix, 0, 1);
		$p->DefineCollection($_POST, $ExcludeByPrefix, 0, 1);
		$p->Set("PageAction", "Generate");
		$p->Remove("btnSubmit");

		return "<div class=\"Container ".$Name."\">
			<form name=\"frm".$Name."\" method=\"get\" action=\"".$this->SelfUrl."\">"
		   .$p->GetHiddenInputs()
			."<h2>".$Title."</h2>
			<table class=\"FileTable\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
				<tr class=\"ListItem\">
					<th class=\"ItemOption\">".GetBasicCheckBox($Name."_ItemController", 1, 0, " onclick=\"CheckController('frm".$Name."', this, 'ImageID[]')\"")."</th>
					<th class=\"ItemName\">Image</th>
					<th class=\"ItemSize\">Size</th>
					<th class=\"ItemDate\">Date</th>
				</tr>"
				.$List
			."</table>
			<div class=\"ButtonContainer\">
				<input type=\"submit\" name=\"btnSubmit\" value=\"Generate Thumbnails\" class=\"Button\" />
			</div>
			</form>
		</div>";
	}

	function FormatListItem($ID, $Name, $Size, $Date, &$Params, $Alternate = "0") {
		$Alternate = ForceBool($Alternate, 0);
		return "<tr class=\"ListItem ".($Alternate?"Alternate":"")."\">
			<td class=\"ItemOption\">".GetBasicCheckBox("ImageID[]", $ID, 0)."</td>
			<td class=\"ItemName\">".$Name."</td>
			<td class=\"ItemSize\">$Size</td>
			<td class=\"ItemDateModified\">".date($this->DateFormat, $Date)."</td>
		</tr>\r\n";
	}
	
	function GenerateThumbnails() {
		// $this->DefineBrowsingDirectory();
		
		// Retrieve incoming ImageIDs to thumbnail
      $ImagesToThumbnail = ForceIncomingArray("ImageID", array());
		  
		// Find those images in the current folder
		$ThumbnailCollection = array();
		$FileCounter = 0;
		$Files = $this->ImageCollection->GetFiles($this->SortBy, $this->SortDirection, $ThumbnailCollection);
		$BatchSize = count($ImagesToThumbnail);
		$BatchIncrement = 1;
		if ($BatchSize > 10) $BatchSize = 10;
		if ($BatchSize > 0) {
			for ($j = 0; $j < count($Files); $j++) {
				$FileCounter += 1;
				$CurrentFileName = $Files[$j]["Name"];
				$CurrentFileSize = $Files[$j]["Size"];
				$CurrentFileDate = $Files[$j]["Date"];
				$CurrentFileHandlerMethod = $Files[$j]["HandlerMethod"];
				
				if (in_array($FileCounter, $ImagesToThumbnail)) {
					// Generate the thumbnail
					$this->GenerateThumbnail($this->GetFileType($this->CurrentBrowsingDirectory, $CurrentFileName), $CurrentFileName, $this->CurrentBrowsingDirectory);
					// Remove the item from the array
               $key = array_search($FileCounter, $ImagesToThumbnail);
					if ($key !== false) array_splice($ImagesToThumbnail, $key, 1);
					$BatchIncrement++;
					if ($BatchIncrement > $BatchSize) $j = count($Files);
				}
			}
		}
		return $ImagesToThumbnail;		
	}
	
	function GenerateThumbnail($ImageType, $SourceImage, $Path) {
		$FauxContext = "0";
		$CreateFunction = "imagecreatefrom".$ImageType;
		$SaveFunction = "image".$ImageType;
		if (strtolower($CreateFunction) == "imagecreatefromgif" && !function_exists("imagecreatefromgif")) {
			$this->ErrorManager->AddError($FauxContext, $this->Name, "GenerateThumbnail", "Your version of PHP does not appear to have GIF thumbnailing support.");
		} elseif (strtolower($CreateFunction) == "imagecreatefromjpeg" && !function_exists("imagecreatefromjpeg")) {
			$this->ErrorManager->AddError($FauxContext, $this->Name, "GenerateThumbnail", "Your version of PHP does not appear to have JPEG thumbnailing support.");
		} elseif (!function_exists($CreateFunction)) {
			$this->ErrorManager->AddError($FauxContext, $this->Name, "GenerateThumbnail", "Your version of PHP does not appear to have ".$CreateFunction." thumbnailing support.");
		}
			
		$Original = @$CreateFunction($this->FilePath($Path,$SourceImage));
		if (!$Original) $this->ErrorManager->AddError($FauxContext,$this->Name, "GenerateThumbnail", "An error occurred while attempting to copy the source image \"".$SourceImage."\". Your version of php (".phpversion().") may not have ".$ImageType." support.");
		$OriginalHeight = ImageSY($Original);
		$OriginalWidth = ImageSX($Original);
		if ($OriginalHeight < $this->ThumbHeight && $OriginalWidth < $this->ThumbWidth) {
			// Just copy the file
         copy($this->FilePath($Path,$SourceImage), $this->FilePath($Path, $this->ThumbPrefix.$SourceImage));
		} else {
			if ((($OriginalWidth * $this->ThumbHeight) / $OriginalHeight) > $this->ThumbWidth) {
				$ThumbHeight = intval(($OriginalHeight * $this->ThumbWidth) / $OriginalWidth);
				$ThumbWidth = $this->ThumbHeight;
			} else {
				$ThumbHeight = $this->ThumbWidth;
				$ThumbWidth = intval(($OriginalWidth * $this->ThumbHeight) / $OriginalHeight);
			}
			if ($ThumbWidth == 0) $ThumbWidth = 1;
			if ($ThumbHeight == 0) $ThumbHeight = 1;
			$Thumb = imagecreatetruecolor($ThumbWidth, $ThumbHeight);
			$FauxContext = "0";
			if (!$Thumb) $this->ErrorManager->AddError($FauxContext,$this->Name, "GenerateThumbnail", "An error occurred while attempting to create a new image.");		
			if (!imagecopyresampled($Thumb, $Original, 0, 0, 0, 0, $ThumbWidth, $ThumbHeight, $OriginalWidth, $OriginalHeight)) $this->ErrorManager->AddError($FauxContext,$this->Name, "GenerateThumbnail", "An error occurred while copying the source image to the thumbnail image.");		
			if (!@$SaveFunction($Thumb, $this->FilePath($Path, $this->ThumbPrefix.$SourceImage))) $this->ErrorManager->AddError($FauxContext,$this->Name, "GenerateThumbnail", "An error occurred while saving the thumbnail \"_thumb.".$SourceImage."\" to the filesystem. Are you sure that PHP has been configured with both read and write access on this folder?");
		}
	}
	
	function GetFileType($Path, $FileName) {
		$FileExtension = GetExtension($FileName);
		$Return = "Invalid";
		if (in_array($FileExtension, array("jpg", "gif", "bmp", "png", "jpe", "jpeg"))) {
			$File = $this->FilePath($Path, $FileName);
			$ImageInfo = getimagesize($File);
			
			/*
			 http://ca.php.net/manual/en/function.getimagesize.php
			 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM
			*/
			switch ($ImageInfo[2]) {
				case 1:
					$Return = "gif";
					break;
				case 2:
					$Return = "jpeg";
					break;
				case 3:
					$Return = "png";
					break;
				case 15:
					$Return = "wbmp";
					break;
			}
		}
		return $Return;
	}
	
	function RetrieveConfigurationPropertiesFromXml($Path) {
		$FauxContext = "0";
		if ($this->ConfigFile == "") $this->ErrorManager->AddError($FauxContext,$this->Name, "RetrieveConfigurationPropertiesFromXml", "You must supply a path to the configuration file");
		
		// Retrieve config file contents
		$File = new File();
		$File->Name = $this->ConfigFile;
		$File->Path = $Path;
		$FileManager = new FileManager();
		$FileManager->ErrorManager = &$this->ErrorManager;
		$File = $FileManager->Get($File);
		// If there were errors retrieving the config file and we're in the CWD, report an error
		if ($this->ErrorManager->ErrorCount > 0 && $Path == $this->CurrentWorkingDirectory) {
			$this->ErrorManager->Clear();
			$this->ErrorManager->AddError($FauxContext,$this->Name, "RetrieveConfigurationPropertiesFromXml", "The root configuration file could not be found/read (_config.xml).");
		// If failed to retrieve the file from a non-root directory, 
		// just accept the root file
		} elseif ($this->ErrorManager->ErrorCount > 0) {
			$this->ErrorManager->Clear();
		// If no errors occurred, continue to retrieve new configuration settings
		} else {
			// Create an XML Parser to retrieve configuration settings
			$XMan = new XmlManager();
			$XMan->ErrorManager = &$this->ErrorManager;
			$MyConfig = $XMan->ParseNode($File->Body);
			if ($MyConfig && $this->ErrorManager->ErrorCount == 0) {
				$this->StyleUrl = $XMan->GetNodeValueByName($MyConfig, "ThumbnailerStyleUrl");
				$this->PageTitle = $XMan->GetNodeValueByName($MyConfig, "PageTitle");
				$this->SortBy = $XMan->GetNodeValueByName($MyConfig, "SortBy");
				$this->SortDirection = $XMan->GetNodeValueByName($MyConfig, "SortDirection");
				$this->DateFormat = $XMan->GetNodeValueByName($MyConfig, "DateFormat");
				$this->ThumbHeight = ForceInt($XMan->GetNodeValueByName($MyConfig, "MaxThumbHeight"), $this->ThumbHeight);
				$this->ThumbWidth = ForceInt($XMan->GetNodeValueByName($MyConfig, "MaxThumbWidth"), $this->ThumbHeight);
				$this->HideFiles = explode(",", $XMan->GetNodeValueByName($MyConfig, "HideFiles"));
				for ($i = 0; $i < count($this->HideFiles); $i++) {
					$this->FullyQualifiedHideFiles[] = $this->CurrentBrowsingDirectory."/".$this->HideFiles[$i];
				}
			} 
		}
		return $this->ErrorManager->Iif();
	}
	
	// Constructor - define default values for class properties
	function Thumbnailer() {
		// Configuration Settings
		$this->ConfigFile = "_config.xml";
		$this->CurrentWorkingDirectory = getcwd();
		
		// Configuration Properties
		$this->Version = "1.1.0";
		$this->Developer = "Mark O'Sullivan";
		$this->Date = "2004 - 2005"; 
		$this->StyleUrl = "_thumbnailer.css";
		$this->PageTitle = "Lussumo Thumbnailer";
		$this->SortBy = "Name";
		$this->SortDirection = "asc";
		$this->DateFormat = "m-d-y";
		
		// Browsing Properties
		$this->FolderDelimiter = "-";
		$this->FolderIDs = ForceIncomingString("did", "");
		if ($this->FolderIDs == "") {
			$this->aFolderID = array();
		} else {
			$this->aFolderID = explode($this->FolderDelimiter, $this->FolderIDs);
		}
		$this->CurrentBrowsingDirectory = $this->CurrentWorkingDirectory;
		$this->SelfUrl = basename(ForceString(@$_SERVER['PHP_SELF'], "index.php"));
		$this->SelfWebPath = ForceString(@$_SERVER['HTTP_HOST'], "").ForceString(@$_SERVER['PHP_SELF'], "");
		// Strip filename from webpath if exists
		if (strpos($this->SelfWebPath,$this->SelfUrl) !== false) $this->SelfWebPath = substr($this->SelfWebPath,0,strpos($this->SelfWebPath,$this->SelfUrl));
		if ($this->SelfWebPath != "") $this->SelfWebPath = "http://".$this->SelfWebPath;
		$this->FolderNavigator = array();
		$this->FolderNavigatorLocation = "";
		$this->Name = "Thumbnailer";
		$this->ThumbnailableFormats = array("gif","jpeg","wbmp","png");
		$this->FolderList = "";
		$this->FileList = "";
		$this->ThumbPrefix = "_thumb.";
		
		$this->HideFiles = array();
		$this->FullyQualifiedHideFiles = array();
	}
}


// Instantiate the Error manager
$ErrorManager = new ErrorManager();
$PageAction = ForceIncomingString("PageAction", "");
$DirectoryID = ForceIncomingString("did", "");

$tn = new Thumbnailer();
$tn->ConfigFile = "_config.xml";
$tn->ErrorManager = &$ErrorManager;
$tn->DefineProperties();
if ($PageAction == "Generate") {
   $ImagesLeftToThumbnail = $tn->GenerateThumbnails();
   if (count($ImagesLeftToThumbnail) == 0) $PageAction = "Complete";
}

echo("<?xml version=\"1.0\" encoding=\"utf-8\"?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en-ca\">
<head>
<title>Lussumo Thumbnailer</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"".$tn->StyleUrl."\" />
<script language=\"Javascript\" type=\"text/javascript\">
	//<![CDATA[
   function CheckController(formName, controller, controlled) {
      var frm = document[formName];
      var CheckedStatus = controller.checked;
      if (frm[controlled]) {
         if (frm[controlled].length) {
            for (i = 0; i < frm[controlled].length; i++) {
               frm[controlled][i].checked = CheckedStatus;
            }
         } else {
            frm[controlled].checked = CheckedStatus;
         }
      }
   }
	//]]>
</script>
</head>
<body>");
   if ($PageAction == "Generate") {
		$p = new Parameters();
      $ExcludeByPrefix = "ImageID";
		$p->DefineCollection($_GET, $ExcludeByPrefix, 0, 1);
		$p->DefineCollection($_POST, $ExcludeByPrefix, 0, 1);
		$p->Set("PageAction", "Generate");
		$p->Remove("btnSubmit");
      echo("<form name=\"frmThumbnailer\" method=\"get\" action=\"".$tn->SelfUrl."\">"
		   .$p->GetHiddenInputs());
      
      $ImagesLeft = count($ImagesLeftToThumbnail);
      for ($i = 0; $i < $ImagesLeft; $i++) {
         echo("<input type=\"hidden\" name=\"ImageID[]\" value=\"".$ImagesLeftToThumbnail[$i]."\" />");
      }
      echo("</form><script language=\"Javascript\">
         setTimeout(\"document.frmThumbnailer.submit();\",300);
      </script>
      <h1>Lussumo Thumbnailer</h1>
      <a class=\"BackToFilebrowser\" href=\"./index.php\">Back to Filebrowser</a>
      <div class=\"Introduction\">
         Processing thumbnail batch
         <br /><a href=\"#\" onclick=\"document.frmThumbnailer.submit();\">".FormatPlural($ImagesLeft, "item", "items")." remaining in batch...</a>
      </div>");
   } elseif ($PageAction == "Complete") {
      echo("<h1>Lussumo Thumbnailer</h1>
      <a class=\"BackToFilebrowser\" href=\"./index.php\">Back to Filebrowser</a>
      <div class=\"Introduction\">
         Batch Process Completed Successfully.
         <br /><a href=\"".$tn->SelfUrl.(($DirectoryID != "")?"?did=".$DirectoryID:"")."\">Click here to continue</a>
      </div>");
   } else {
      echo("<h1>Lussumo Thumbnailer</h1>
      <a class=\"BackToFilebrowser\" href=\"./index.php".($DirectoryID != ""?"?did=".$DirectoryID:"")."\">Back to Filebrowser</a>
      <div class=\"Introduction\">
         <strong>This is the Lussumo Thumbnailer.</strong>
         <br />You can use this application to create thumbnail images for your Lussumo Filebrowser.
         <br /><br />Choose the images for which you would like to create thumbnails and click the \"Generate Thumbnails\" button.
      </div>
      <div class=\"Body\">
      ".$tn->FolderList);
      if ($tn->FileList == "") {
         echo("<div class=\"Container Thumbnailed\">
            <h2>No Images Found</h2>
            <p>There were no thumbnail candidate images found in the selected folder.</p>
         </div>");
      } else {
         echo($tn->FileList);
      }
      echo("</div>");
   }
echo("<div class=\"Foot\">
   <div class=\"ApplicationInformation\"><a href=\"http://lussumo.com\">Lussumo</a> <a href=\"http://thefilebrowser.com\">Filebrowser</a> &copy; ".$tn->Date."</div>
   <div class=\"DeveloperInformation\">Developed by ".$tn->Developer."</div>
</div>
   </body>
</html>");
?>