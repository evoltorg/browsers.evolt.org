
<cfapplication name="evolt" CLIENTMANAGEMENT="YES" sessionmanagement="yes">

<cfset title = "evolt.org">
<cfset data = "evolt">


<cfparam name="new" default="0">
<cfparam name="cid" default="0">
<cfparam name="catid" default="1">
<cfparam name="uid" default="0">
<cfparam name="menu" default="1">
<cfparam name="pmenu" default="1">
<cfparam name="session.loggedin" default="no">
<cfparam name="session.userid" default="0">
<cfparam name="session.admin" default="no">
<cfparam name="session.god" default="0">
<CFPARAM name="StartRow" default="1">
<cfparam name="many" default="5">
<cfparam name="listtype" default="1">
<cfset "startplus"="#startrow# + #many#">
