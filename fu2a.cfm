<cfsetting enablecfoutputonly="yes">

<cfparam name="attributes.displaybase" default="no">
<cfparam name="caller.id" default="">

<cfif isdefined("cgi.path_info")>
	<cfif len(cgi.path_info)>
		<cfparam name="cleanpathinfo" default="#cgi.path_info#">
    <cfset findindex=findnocase(GetFileFromPath(cgi.script_name),cleanpathinfo)>
		<cfif findindex>
			<cfset cleanpathinfo=RemoveChars(cleanpathinfo, 1, findindex + Len(GetFileFromPath(cgi.script_name)))>
		</cfif>
		
		<cfif len(cleanpathinfo)>
			<!--- If you want to append .htm onto the end of your URL, this will clean it 
				so it doesn't affect your variables --->
			<cfif len(cleanpathinfo) gte 4 and right(cleanpathinfo,4) is ".htm">
				<cfset cleanpathinfo=RemoveChars(cleanpathinfo, len(cleanpathinfo)-3, 4)>
			</cfif>
			
			<cfloop index="i" from="1" to="#listlen(cleanpathinfo, "/")#" step="2"> 
				<cfset urlname = listgetat(cleanpathinfo, i, "/")>
				<cfif listlen(cleanpathinfo,"/") gte i+1>
					<cfset urlvalue = listgetat(cleanpathinfo, i + 1, "/")>
					<CFIF refindnocase("[[:alpha:]]",left(trim(urlname),1)) and NOT ISDEFINED( 'caller.ATTRIBUTES.' & urlname )>
						<cfswitch expression="#urlname#">
							<cfcase value="cfid">
								<cfparam name="url.cfid" default="#urlvalue#">
							</cfcase>
							<cfcase value="cftoken">
								<cfparam name="url.cftoken" default="#urlvalue#">
							</cfcase>
							<cfdefaultcase>
								<cfif urlvalue is "null">
								    <cfset "url.#urlname#" = ""> 
								<cfelse> 
								    <cfset "url.#urlname#" = urlvalue> 
								</cfif>
							</cfdefaultcase>
						</cfswitch>
					</cfif>
				</cfif>
			</cfloop>
		</cfif>
		
	<!--- This is for converting url fields to attributes scoped variables --->
	</cfif>
</cfif>

<!--- this is so that your relative images will work, this is only needed if your using search engine urls --->
<cfif attributes.displaybase>
	<CFSET caller.Base = REReplace(CGI.SCRIPT_NAME, "[^/]+\.cfm.*", "")>
	<CFSET caller.Base= "http://" & CGI.SERVER_NAME & caller.Base>
	<cfoutput><base href="#caller.Base#"></cfoutput>
</cfif>
<cfsetting enablecfoutputonly="No">

