<{assign var="shadow" value=""}>
<{if 't'|in_array:$shadow_arr and 'l'|in_array:$shadow_arr and 'r'|in_array:$shadow_arr and  'b'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'0px 0px 6px 3px rgba(50, 50, 50, 0.4),'}>
<{elseif 't'|in_array:$shadow_arr and 'l'|in_array:$shadow_arr and 'r'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'-3px 0px 5px 0px rgba(50, 50, 50, 0.2), -2px -2px 5px 0px rgba(50, 50, 50, 0.2), 0px -3px 5px 0px rgba(50, 50, 50, 0.2), 2px -2px 5px 0px rgba(50, 50, 50, 0.2), 3px 0px 5px 0px rgba(50, 50, 50, 0.2),'}>
<{elseif 'b'|in_array:$shadow_arr and 'l'|in_array:$shadow_arr and 'r'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'-3px 0px 5px 0px rgba(50, 50, 50, 0.2), -2px -2px 5px 0px rgba(50, 50, 50, 0.2), 0px 3px 5px 0px rgba(50, 50, 50, 0.2), 2px 2px 5px 0px rgba(50, 50, 50, 0.2), 3px 0px 5px 0px rgba(50, 50, 50, 0.2),'}>
<{elseif 'b'|in_array:$shadow_arr and 'l'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'-3px 0px 5px 0px rgba(50, 50, 50, 0.2), -2px 2px 5px 0px rgba(50, 50, 50, 0.2), 0px 3px 5px 0px rgba(50, 50, 50, 0.2),'}>
<{elseif 't'|in_array:$shadow_arr and 'l'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'0px -3px 5px 0px rgba(50, 50, 50, 0.2), -2px -2px 5px 0px rgba(50, 50, 50, 0.2), -3px 0px 5px 0px rgba(50, 50, 50, 0.2),'}>
<{elseif 'b'|in_array:$shadow_arr and 'r'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'3px 0px 5px 0px rgba(50, 50, 50, 0.2), 2px 2px 5px 0px rgba(50, 50, 50, 0.2), 0px 3px 5px 0px rgba(50, 50, 50, 0.2),'}>
<{elseif 't'|in_array:$shadow_arr and 'r'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'0px -3px 5px 0px rgba(50, 50, 50, 0.2), 2px -2px 5px 0px rgba(50, 50, 50, 0.2), 3px 0px 5px 0px rgba(50, 50, 50, 0.2),'}>
<{elseif 'l'|in_array:$shadow_arr and 'r'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'-3px 0px 5px 0px rgba(50, 50, 50, 0.4), 3px 0px 5px 0px rgba(50, 50, 50, 0.4),'}>
<{elseif 't'|in_array:$shadow_arr and 'b'|in_array:$shadow_arr}>
    <{assign var="shadow" value=$shadow|cat:'0px -3px 5px 0px rgba(50, 50, 50, 0.4), 0px 3px 5px 0px rgba(50, 50, 50, 0.4),'}>
<{else}>
    <{if 't'|in_array:$shadow_arr}>
        <{assign var="shadow" value=$shadow|cat:'0px -3px 5px 0px rgba(50, 50, 50, 0.4),'}>
    <{/if}>

    <{if 'b'|in_array:$shadow_arr}>
        <{assign var="shadow" value=$shadow|cat:'0px 3px 5px 0px rgba(50, 50, 50, 0.4),'}>
    <{/if}>

    <{if 'l'|in_array:$shadow_arr}>
        <{assign var="shadow" value=$shadow|cat:'-3px 0px 5px 0px rgba(50, 50, 50, 0.4),'}>
    <{/if}>

    <{if 'r'|in_array:$shadow_arr}>
        <{assign var="shadow" value=$shadow|cat:'3px 0px 5px 0px rgba(50, 50, 50, 0.4),'}>
    <{/if}>
<{/if}>

<{*
?????? 0px -3px 5px 0px rgba(50, 50, 50, 0.4),
?????? 3px 0px 5px 0px rgba(50, 50, 50, 0.4),
?????? 0px 3px 5px 0px rgba(50, 50, 50, 0.4),
??????-3px 0px 5px 0px rgba(50, 50, 50, 0.4),
????????? 2px -2px 5px 0px rgba(50, 50, 50, 0.4),
????????? 2px 2px 5px 0px rgba(50, 50, 50, 0.4),
?????????-2px -2px 5px 0px rgba(50, 50, 50, 0.4),
?????????-2px 2px 5px 0px rgba(50, 50, 50, 0.4),
*}>