<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>TaskManager API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETtask_statuses">
                                <a href="#endpoints-GETtask_statuses">GET task_statuses</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTtask_statuses">
                                <a href="#endpoints-POSTtask_statuses">POST task_statuses</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTtask_statuses--id-">
                                <a href="#endpoints-PUTtask_statuses--id-">PUT task_statuses/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEtask_statuses--id-">
                                <a href="#endpoints-DELETEtask_statuses--id-">DELETE task_statuses/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlabels">
                                <a href="#endpoints-GETlabels">GET labels</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlabels">
                                <a href="#endpoints-POSTlabels">POST labels</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTlabels--id-">
                                <a href="#endpoints-PUTlabels--id-">PUT labels/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETElabels--id-">
                                <a href="#endpoints-DELETElabels--id-">DELETE labels/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETtasks">
                                <a href="#endpoints-GETtasks">GET tasks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTtasks">
                                <a href="#endpoints-POSTtasks">POST tasks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETtasks--id-">
                                <a href="#endpoints-GETtasks--id-">GET tasks/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTtasks--id-">
                                <a href="#endpoints-PUTtasks--id-">PUT tasks/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEtasks--id-">
                                <a href="#endpoints-DELETEtasks--id-">DELETE tasks/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTregister">
                                <a href="#endpoints-POSTregister">Handle an incoming registration request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogin">
                                <a href="#endpoints-POSTlogin">Handle an incoming authentication request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogout">
                                <a href="#endpoints-POSTlogout">Destroy an authenticated session.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 26, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>API Documentation for Task Manager</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETtask_statuses">GET task_statuses</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETtask_statuses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/task_statuses" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/task_statuses"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/task_statuses';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETtask_statuses">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IlpzcUd4WHhic3R1WmtJWUp3UkVqMnc9PSIsInZhbHVlIjoiQTFiZW4yV1RWcno2VmlUN0ZuWXNsdmltL0xrZ05BVm5Bd2R3OGs2cmptS0d5S3kxRGxBNDF3Y0NxWFVXQ210M3lMRHNEQkE0aU9yaXdEOG5CRlo2b2g0SkNLQWxmWnJWbVQ0MkdodGxSWHQ1SzYwb2FjR0ZRaEJKcXFHSzl4UmkiLCJtYWMiOiJjMWQwNWJlMTc4Y2QzYTE0ZjMwZTk4YTlhNWI5OTkwOTg4ZGRjNDZhOWUzMjk3Njg4MzY2N2M5MDkwNzYyYWYxIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; samesite=lax; taskmanager_session=eyJpdiI6IkZYV2dvZkplVk9wN3dnVmJZQzNsSGc9PSIsInZhbHVlIjoiWCtzdVB3T3VkYjZYQmFhMFVMcjlMdHR6SUdEUlhKdTB6Q005a1ZtcGc5VTNsSWRoR3B2bHY2UjkvMDNSSnJuY2p2U25KNVRHTGdiZ3pIOStQOGpNTEVjL1pzUjlzSHZoaDlybE1uTG9uMXd5QTJoU1VyUEU0NFZ5SFdwMXpBNkUiLCJtYWMiOiJiNWNlZGJlY2ZjMzQwYjIyNWVmMjViNjUzYzNhNjI0ZTc1MTZhYmQwMTQ5MDUzNTQyOGUzYzZkY2RiYzA4M2FmIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;ru&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;rIJOYmswzGPfXrIXYG6w3A6kAcfwlqGiVVLe9U9q&quot;&gt;
        &lt;meta name=&quot;csrf-param&quot; content=&quot;_token&quot; /&gt;

        &lt;title&gt;Менеджер задач&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-DedrspOS.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-DedrspOS.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen bg-gray-100&quot;&gt;

            &lt;!-- Page Heading --&gt;
            &lt;header class=&quot;bg-white shadow&quot;&gt;
                &lt;nav x-data=&quot;{ open: false }&quot; class=&quot;bg-white border-b border-gray-100&quot;&gt;
    &lt;!-- Primary Navigation Menu --&gt;
    &lt;div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
        &lt;div class=&quot;flex justify-between h-16&quot;&gt;
            &lt;!-- Logo --&gt;
            &lt;div class=&quot;shrink-0 flex items-center&quot;&gt;
                &lt;a href=&quot;http://localhost&quot;&gt;
                    &lt;span class=&quot;self-center text-xl font-semibold whitespace-nowrap&quot;&gt;
                        Менеджер задач
                    &lt;/span&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;!-- Navigation Links --&gt;
            &lt;div class=&quot;hidden space-x-8 sm:-my-px sm:ms-10 sm:flex&quot;&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/tasks&quot;&gt;
    Задачи
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/task_statuses&quot;&gt;
    Статусы
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/labels&quot;&gt;
    Метки
&lt;/a&gt;
            &lt;/div&gt;
            &lt;div class=&quot;flex&quot;&gt;
                                    &lt;nav class=&quot;flex items-center justify-end gap-4&quot;&gt;
                                                    &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/login&quot;&gt;Вход&lt;/a&gt;

                                                            &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/register&quot;&gt;Регистрация&lt;/a&gt;
                                                                        &lt;/nav&gt;
                            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
            &lt;/header&gt;

            &lt;!-- Page Content --&gt;
            &lt;main class=&quot;max-w-screen-xl px-4 pt-20 pb-8 mx-auto&quot;&gt;
                                &lt;div class=&quot;mr-auto place-self-center lg:col-span-7&quot;&gt;
        &lt;div class=&quot;grid col-span-full&quot;&gt;
            &lt;div&gt;
                &lt;h1 class=&quot;max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl&quot;&gt;
                    Статусы       
                &lt;/h1&gt; 
                            &lt;/div&gt;
            
            &lt;table class=&quot;table mt-5&quot;&gt;
                &lt;thead class=&quot;border-b-2 border-solid border-black text-left&quot;&gt;
                    &lt;tr&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;ID&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Имя&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Дата создания&lt;/th&gt;
                                            &lt;/tr&gt;
                &lt;/thead&gt;
                &lt;tbody&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;1&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;новый&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;2&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;в работе&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;3&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;4&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;завершен&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                    &lt;/tbody&gt;
            &lt;/table&gt;
            &lt;div class=&quot;mt-2&quot;&gt;
                
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
            &lt;/main&gt;

            &lt;footer class=&quot;sticky top-full bg-gray-700 shadow&quot;&gt;
                &lt;div x-data=&quot;{ open: false }&quot; class=&quot;bg-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
    &lt;nav class=&quot;flex h-16 justify-between hidden sm:-my-px sm:ms-10 sm:flex mt-2 space-x-8&quot;&gt;
        &lt;a class=&quot;inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-400 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/docs&quot;&gt;
    Api
&lt;/a&gt;
    &lt;/nav&gt;
&lt;/div&gt;
            &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETtask_statuses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtask_statuses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtask_statuses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtask_statuses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtask_statuses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtask_statuses" data-method="GET"
      data-path="task_statuses"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtask_statuses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtask_statuses"
                    onclick="tryItOut('GETtask_statuses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtask_statuses"
                    onclick="cancelTryOut('GETtask_statuses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtask_statuses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>task_statuses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETtask_statuses"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtask_statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtask_statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTtask_statuses">POST task_statuses</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTtask_statuses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/task_statuses" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/task_statuses"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/task_statuses';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTtask_statuses">
</span>
<span id="execution-results-POSTtask_statuses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTtask_statuses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTtask_statuses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTtask_statuses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTtask_statuses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTtask_statuses" data-method="POST"
      data-path="task_statuses"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTtask_statuses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTtask_statuses"
                    onclick="tryItOut('POSTtask_statuses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTtask_statuses"
                    onclick="cancelTryOut('POSTtask_statuses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTtask_statuses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>task_statuses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTtask_statuses"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTtask_statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTtask_statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTtask_statuses"
               value="architecto"
               data-component="body">
    <br>
<p>The name of the Task Status. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTtask_statuses--id-">PUT task_statuses/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTtask_statuses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/task_statuses/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/task_statuses/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/task_statuses/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTtask_statuses--id-">
</span>
<span id="execution-results-PUTtask_statuses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTtask_statuses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTtask_statuses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTtask_statuses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTtask_statuses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTtask_statuses--id-" data-method="PUT"
      data-path="task_statuses/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTtask_statuses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTtask_statuses--id-"
                    onclick="tryItOut('PUTtask_statuses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTtask_statuses--id-"
                    onclick="cancelTryOut('PUTtask_statuses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTtask_statuses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>task_statuses/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>task_statuses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTtask_statuses--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTtask_statuses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTtask_statuses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTtask_statuses--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the task status. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTtask_statuses--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The name of the Task Status. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEtask_statuses--id-">DELETE task_statuses/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEtask_statuses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/task_statuses/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/task_statuses/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/task_statuses/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEtask_statuses--id-">
</span>
<span id="execution-results-DELETEtask_statuses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEtask_statuses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEtask_statuses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEtask_statuses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEtask_statuses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEtask_statuses--id-" data-method="DELETE"
      data-path="task_statuses/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEtask_statuses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEtask_statuses--id-"
                    onclick="tryItOut('DELETEtask_statuses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEtask_statuses--id-"
                    onclick="cancelTryOut('DELETEtask_statuses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEtask_statuses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>task_statuses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEtask_statuses--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEtask_statuses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEtask_statuses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEtask_statuses--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the task status. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETlabels">GET labels</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETlabels">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/labels" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/labels"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/labels';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETlabels">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IkptZ2pBNlBiMkNoMHJvbkhoV2JPMmc9PSIsInZhbHVlIjoibWxVUDZZM2lUYUk1akpKcGhDbk9XK1BQRVNnakFHVnE3WW9VNU13RVlDV2wyajBsNDZrZ28vM054QmpyaXZwNSt0Nlc2L1I0dnEvTE1pZWRhaDNEcVJNUHV2OFpRdUtnVlBaVGErOTJTNFRBS2UyM0ZOaGo0T0pBSTRZbWwySGciLCJtYWMiOiI3OTVkYWIwYTRkYWMzZTAyMTlhYmFkZGIwYTNmMDJlNGNkODgzNjMyYTE1YTcyMzFkMGE3ZTdhNWE0ZDQ2MWU4IiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; samesite=lax; taskmanager_session=eyJpdiI6InJ0YUZGT3Z5K3BrN21Jd1R4TGNZclE9PSIsInZhbHVlIjoiTkpKcVJNeWNLbjZua1hZdGtCaUthZmJKbldGUEhBSTJ0dUlMZ0xzRDRlMkpmUzNuemVXakV5TUQzZUdsU2gyU2R4NHFuZzh4Rm9YY3JjY0QvNVRvM0Q2djY0TkpXN0YxbWNmQm9WcFc2cytyb0dQYzVVWlJzNjRUcWNxYk9OQ2UiLCJtYWMiOiJlNWJiNzJlMDdhNTg5MmZiN2E3NGM1ZGM1NGY2MGI4YTAzYjQ5ODYzZWJjOWUxNTFiYmYxODc5MDA4NDVmZjBiIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;ru&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;rIJOYmswzGPfXrIXYG6w3A6kAcfwlqGiVVLe9U9q&quot;&gt;
        &lt;meta name=&quot;csrf-param&quot; content=&quot;_token&quot; /&gt;

        &lt;title&gt;Менеджер задач&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-DedrspOS.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-DedrspOS.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen bg-gray-100&quot;&gt;

            &lt;!-- Page Heading --&gt;
            &lt;header class=&quot;bg-white shadow&quot;&gt;
                &lt;nav x-data=&quot;{ open: false }&quot; class=&quot;bg-white border-b border-gray-100&quot;&gt;
    &lt;!-- Primary Navigation Menu --&gt;
    &lt;div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
        &lt;div class=&quot;flex justify-between h-16&quot;&gt;
            &lt;!-- Logo --&gt;
            &lt;div class=&quot;shrink-0 flex items-center&quot;&gt;
                &lt;a href=&quot;http://localhost&quot;&gt;
                    &lt;span class=&quot;self-center text-xl font-semibold whitespace-nowrap&quot;&gt;
                        Менеджер задач
                    &lt;/span&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;!-- Navigation Links --&gt;
            &lt;div class=&quot;hidden space-x-8 sm:-my-px sm:ms-10 sm:flex&quot;&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/tasks&quot;&gt;
    Задачи
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/task_statuses&quot;&gt;
    Статусы
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/labels&quot;&gt;
    Метки
&lt;/a&gt;
            &lt;/div&gt;
            &lt;div class=&quot;flex&quot;&gt;
                                    &lt;nav class=&quot;flex items-center justify-end gap-4&quot;&gt;
                                                    &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/login&quot;&gt;Вход&lt;/a&gt;

                                                            &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/register&quot;&gt;Регистрация&lt;/a&gt;
                                                                        &lt;/nav&gt;
                            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
            &lt;/header&gt;

            &lt;!-- Page Content --&gt;
            &lt;main class=&quot;max-w-screen-xl px-4 pt-20 pb-8 mx-auto&quot;&gt;
                                &lt;div class=&quot;mr-auto place-self-center lg:col-span-7&quot;&gt;
        &lt;div class=&quot;grid col-span-full&quot;&gt;
            &lt;div&gt;
                &lt;h1 class=&quot;max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl&quot;&gt;
                    Метки       
                &lt;/h1&gt; 
                            &lt;/div&gt;
            
            &lt;table class=&quot;table mt-5&quot;&gt;
                &lt;thead class=&quot;border-b-2 border-solid border-black text-left&quot;&gt;
                    &lt;tr&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;ID&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Имя&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Описание&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Дата создания&lt;/th&gt;
                                            &lt;/tr&gt;
                &lt;/thead&gt;
                &lt;tbody&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;1&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;ошибка&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;Какая-то ошибка в коде или проблема с функциональностью&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;2&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;документация&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;Задача которая касается документации&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;3&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;дубликат&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;Повтор другой задачи&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-2&quot;&gt;4&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;доработка&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;Новая фича, которую нужно запилить&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-2&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                    &lt;/tbody&gt;
            &lt;/table&gt;
            &lt;div class=&quot;mt-2&quot;&gt;
                
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
            &lt;/main&gt;

            &lt;footer class=&quot;sticky top-full bg-gray-700 shadow&quot;&gt;
                &lt;div x-data=&quot;{ open: false }&quot; class=&quot;bg-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
    &lt;nav class=&quot;flex h-16 justify-between hidden sm:-my-px sm:ms-10 sm:flex mt-2 space-x-8&quot;&gt;
        &lt;a class=&quot;inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-400 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/docs&quot;&gt;
    Api
&lt;/a&gt;
    &lt;/nav&gt;
&lt;/div&gt;
            &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETlabels" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlabels"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlabels"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlabels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlabels">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlabels" data-method="GET"
      data-path="labels"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlabels', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlabels"
                    onclick="tryItOut('GETlabels');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlabels"
                    onclick="cancelTryOut('GETlabels');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlabels"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>labels</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETlabels"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlabels"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlabels"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlabels">POST labels</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTlabels">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/labels" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"description\": \"Eius et animi quos velit et.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/labels"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "description": "Eius et animi quos velit et."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/labels';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
            'description' =&gt; 'Eius et animi quos velit et.',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTlabels">
</span>
<span id="execution-results-POSTlabels" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlabels"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlabels"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlabels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlabels">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlabels" data-method="POST"
      data-path="labels"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlabels', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlabels"
                    onclick="tryItOut('POSTlabels');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlabels"
                    onclick="cancelTryOut('POSTlabels');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlabels"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>labels</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTlabels"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlabels"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlabels"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTlabels"
               value="architecto"
               data-component="body">
    <br>
<p>The name of the Label. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTlabels"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>The description of the Label. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTlabels--id-">PUT labels/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTlabels--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/labels/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"description\": \"Eius et animi quos velit et.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/labels/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "description": "Eius et animi quos velit et."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/labels/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
            'description' =&gt; 'Eius et animi quos velit et.',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTlabels--id-">
</span>
<span id="execution-results-PUTlabels--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTlabels--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTlabels--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTlabels--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTlabels--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTlabels--id-" data-method="PUT"
      data-path="labels/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTlabels--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTlabels--id-"
                    onclick="tryItOut('PUTlabels--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTlabels--id-"
                    onclick="cancelTryOut('PUTlabels--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTlabels--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>labels/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>labels/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTlabels--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTlabels--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTlabels--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTlabels--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the label. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTlabels--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The name of the Label. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTlabels--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>The description of the Label. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETElabels--id-">DELETE labels/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETElabels--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/labels/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/labels/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/labels/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETElabels--id-">
</span>
<span id="execution-results-DELETElabels--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETElabels--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETElabels--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETElabels--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETElabels--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETElabels--id-" data-method="DELETE"
      data-path="labels/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETElabels--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETElabels--id-"
                    onclick="tryItOut('DELETElabels--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETElabels--id-"
                    onclick="cancelTryOut('DELETElabels--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETElabels--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>labels/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETElabels--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETElabels--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETElabels--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETElabels--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the label. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETtasks">GET tasks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETtasks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/tasks" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/tasks"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/tasks';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETtasks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IlBKNWR0b2pWcG9qbGhpKzJDUFhGVGc9PSIsInZhbHVlIjoiWXhLbGRtSSt2MVZGemFDUktjekMyUmZwcEx4RFBxbkxNTXhNOHhaSktGYXIwWXBScnZKUGZOdm9MZy9vdVBMOU1KMXdYVlhpY016S2J4WXZhODlWaGE3bkJrSDN6bEJkM29TVVIyTTAzYitBajY0eXpiYXlzR3ZidmNWcjJEVTYiLCJtYWMiOiIyNjBhNGQ5NDM2MTk3NmJiMDZmNTZiN2VmMTIyNTRkMGNjZjg5MTViMWVlOGY2ZTBiMGU4YWI3NzlmZjI5MTFiIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; samesite=lax; taskmanager_session=eyJpdiI6Imlmbk9pQzN2U25qOUQ2b1g1U0ZieGc9PSIsInZhbHVlIjoicFRUcWpQYm1nS0tnaVJEdTBWdjA1NDRyRkJlQVppaFhsQXhJYzZheEIwSi9LbVJlMmNaOThyTk9MbmtmMDZQZVgvbVcvaU5zUW1QZUc2S0pYdzJkSFNiMUtaQjA4SU9teTVHWGlXOFlMaUpacDhDa2tHVklFbFdBdFY5QzhWOEwiLCJtYWMiOiI0Zjc3ZjI0MmIxOTBmNzM1MjBmNmI1ZmE4YTdhZDcwYzcxMzBlN2I0YWUwOGY3NWY0ZWY4MTZmYmU4MzY0NWMwIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;ru&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;rIJOYmswzGPfXrIXYG6w3A6kAcfwlqGiVVLe9U9q&quot;&gt;
        &lt;meta name=&quot;csrf-param&quot; content=&quot;_token&quot; /&gt;

        &lt;title&gt;Менеджер задач&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-DedrspOS.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-DedrspOS.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen bg-gray-100&quot;&gt;

            &lt;!-- Page Heading --&gt;
            &lt;header class=&quot;bg-white shadow&quot;&gt;
                &lt;nav x-data=&quot;{ open: false }&quot; class=&quot;bg-white border-b border-gray-100&quot;&gt;
    &lt;!-- Primary Navigation Menu --&gt;
    &lt;div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
        &lt;div class=&quot;flex justify-between h-16&quot;&gt;
            &lt;!-- Logo --&gt;
            &lt;div class=&quot;shrink-0 flex items-center&quot;&gt;
                &lt;a href=&quot;http://localhost&quot;&gt;
                    &lt;span class=&quot;self-center text-xl font-semibold whitespace-nowrap&quot;&gt;
                        Менеджер задач
                    &lt;/span&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;!-- Navigation Links --&gt;
            &lt;div class=&quot;hidden space-x-8 sm:-my-px sm:ms-10 sm:flex&quot;&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/tasks&quot;&gt;
    Задачи
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/task_statuses&quot;&gt;
    Статусы
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/labels&quot;&gt;
    Метки
&lt;/a&gt;
            &lt;/div&gt;
            &lt;div class=&quot;flex&quot;&gt;
                                    &lt;nav class=&quot;flex items-center justify-end gap-4&quot;&gt;
                                                    &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/login&quot;&gt;Вход&lt;/a&gt;

                                                            &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/register&quot;&gt;Регистрация&lt;/a&gt;
                                                                        &lt;/nav&gt;
                            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
            &lt;/header&gt;

            &lt;!-- Page Content --&gt;
            &lt;main class=&quot;max-w-screen-xl px-4 pt-20 pb-8 mx-auto&quot;&gt;
                                &lt;div class=&quot;mr-auto place-self-center lg:col-span-7&quot;&gt;
        &lt;div class=&quot;grid col-span-full&quot;&gt;
            &lt;div&gt;
                &lt;h1 class=&quot;max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl&quot;&gt;
                    Задачи       
                &lt;/h1&gt;
                &lt;div class=&quot;mb-4&quot;&gt;
                    &lt;form method=&quot;GET&quot; action=&quot;http://localhost/tasks&quot;&gt;
                        &lt;select class=&quot;rounded border-gray-300 my-3&quot; name=&quot;filter[status_id]&quot; id=&quot;filter[status_id]&quot;&gt;&lt;option value selected=&quot;selected&quot;&gt;Статус&lt;/option&gt;&lt;option value=&quot;2&quot;&gt;в работе&lt;/option&gt;&lt;option value=&quot;4&quot;&gt;завершен&lt;/option&gt;&lt;option value=&quot;3&quot;&gt;на тестировании&lt;/option&gt;&lt;option value=&quot;1&quot;&gt;новый&lt;/option&gt;&lt;/select&gt;
                        &lt;select class=&quot;rounded border-gray-300 my-3&quot; name=&quot;filter[created_by_id]&quot; id=&quot;filter[created_by_id]&quot;&gt;&lt;option value selected=&quot;selected&quot;&gt;Автор&lt;/option&gt;&lt;option value=&quot;1&quot;&gt;Антонова Наталья Александровна&lt;/option&gt;&lt;option value=&quot;2&quot;&gt;Лебедев Аким Дмитриевич&lt;/option&gt;&lt;option value=&quot;3&quot;&gt;Суханов Сергей Дмитриевич&lt;/option&gt;&lt;option value=&quot;4&quot;&gt;Некрасова Кристина Борисовна&lt;/option&gt;&lt;option value=&quot;5&quot;&gt;Полина Евгеньевна Комарова&lt;/option&gt;&lt;option value=&quot;6&quot;&gt;Юдина Галина Владимировна&lt;/option&gt;&lt;option value=&quot;7&quot;&gt;Любовь Андреевна Некрасова&lt;/option&gt;&lt;option value=&quot;8&quot;&gt;Виктор Андреевич Соловьёв&lt;/option&gt;&lt;option value=&quot;9&quot;&gt;Розалина Фёдоровна Красильникова&lt;/option&gt;&lt;option value=&quot;10&quot;&gt;Овчинников Нестор Романович&lt;/option&gt;&lt;option value=&quot;11&quot;&gt;Борис Алексеевич Моисеев&lt;/option&gt;&lt;option value=&quot;12&quot;&gt;Сава Максимович Фёдоров&lt;/option&gt;&lt;option value=&quot;13&quot;&gt;Иван Владимирович Зверев&lt;/option&gt;&lt;option value=&quot;14&quot;&gt;Сергей Геннадьевич Безруков&lt;/option&gt;&lt;option value=&quot;15&quot;&gt;Владимир Владимирович Галкин&lt;/option&gt;&lt;option value=&quot;16&quot;&gt;Павел Анатольевич Максимов&lt;/option&gt;&lt;option value=&quot;17&quot;&gt;Sidney Sauer&lt;/option&gt;&lt;option value=&quot;18&quot;&gt;Eda Effertz Jr.&lt;/option&gt;&lt;option value=&quot;19&quot;&gt;Prof. Vincenzo Tremblay II&lt;/option&gt;&lt;option value=&quot;20&quot;&gt;Raina Lockman I&lt;/option&gt;&lt;option value=&quot;21&quot;&gt;Jay Stoltenberg&lt;/option&gt;&lt;option value=&quot;22&quot;&gt;Prof. Rachel Franecki I&lt;/option&gt;&lt;option value=&quot;23&quot;&gt;Willow D&amp;#039;Amore&lt;/option&gt;&lt;option value=&quot;24&quot;&gt;Prof. Jeffery Johnson II&lt;/option&gt;&lt;option value=&quot;25&quot;&gt;Edwina Hayes&lt;/option&gt;&lt;option value=&quot;26&quot;&gt;Nathen Keebler&lt;/option&gt;&lt;option value=&quot;27&quot;&gt;Raphael Abshire&lt;/option&gt;&lt;option value=&quot;28&quot;&gt;Kaleb Greenholt&lt;/option&gt;&lt;option value=&quot;29&quot;&gt;Anissa Hudson&lt;/option&gt;&lt;option value=&quot;30&quot;&gt;Prof. Darryl Howe I&lt;/option&gt;&lt;option value=&quot;31&quot;&gt;Trinity McDermott&lt;/option&gt;&lt;option value=&quot;32&quot;&gt;Unique Bartell&lt;/option&gt;&lt;option value=&quot;33&quot;&gt;Anthony Klein&lt;/option&gt;&lt;option value=&quot;34&quot;&gt;Mr. Waino Cummerata I&lt;/option&gt;&lt;option value=&quot;35&quot;&gt;Cleora Greenholt&lt;/option&gt;&lt;option value=&quot;36&quot;&gt;Lori Reilly&lt;/option&gt;&lt;option value=&quot;37&quot;&gt;Lindsay Bednar&lt;/option&gt;&lt;option value=&quot;38&quot;&gt;Edgardo Rohan&lt;/option&gt;&lt;option value=&quot;39&quot;&gt;Jodie Reichert MD&lt;/option&gt;&lt;option value=&quot;40&quot;&gt;Miss Elmira Price&lt;/option&gt;&lt;option value=&quot;41&quot;&gt;Rocky Lakin&lt;/option&gt;&lt;option value=&quot;42&quot;&gt;Jovani Schumm Sr.&lt;/option&gt;&lt;option value=&quot;43&quot;&gt;Devyn Gulgowski&lt;/option&gt;&lt;option value=&quot;44&quot;&gt;Prof. Rita Rodriguez&lt;/option&gt;&lt;option value=&quot;45&quot;&gt;Cathrine Conn&lt;/option&gt;&lt;option value=&quot;46&quot;&gt;Mr. Pietro Schuster IV&lt;/option&gt;&lt;option value=&quot;47&quot;&gt;Clare Bailey&lt;/option&gt;&lt;option value=&quot;48&quot;&gt;Barrett Lehner V&lt;/option&gt;&lt;option value=&quot;49&quot;&gt;alex&lt;/option&gt;&lt;/select&gt;
                        &lt;select class=&quot;rounded border-gray-300 my-3&quot; name=&quot;filter[assigned_to_id]&quot; id=&quot;filter[assigned_to_id]&quot;&gt;&lt;option value selected=&quot;selected&quot;&gt;Исполнитель&lt;/option&gt;&lt;option value=&quot;1&quot;&gt;Антонова Наталья Александровна&lt;/option&gt;&lt;option value=&quot;2&quot;&gt;Лебедев Аким Дмитриевич&lt;/option&gt;&lt;option value=&quot;3&quot;&gt;Суханов Сергей Дмитриевич&lt;/option&gt;&lt;option value=&quot;4&quot;&gt;Некрасова Кристина Борисовна&lt;/option&gt;&lt;option value=&quot;5&quot;&gt;Полина Евгеньевна Комарова&lt;/option&gt;&lt;option value=&quot;6&quot;&gt;Юдина Галина Владимировна&lt;/option&gt;&lt;option value=&quot;7&quot;&gt;Любовь Андреевна Некрасова&lt;/option&gt;&lt;option value=&quot;8&quot;&gt;Виктор Андреевич Соловьёв&lt;/option&gt;&lt;option value=&quot;9&quot;&gt;Розалина Фёдоровна Красильникова&lt;/option&gt;&lt;option value=&quot;10&quot;&gt;Овчинников Нестор Романович&lt;/option&gt;&lt;option value=&quot;11&quot;&gt;Борис Алексеевич Моисеев&lt;/option&gt;&lt;option value=&quot;12&quot;&gt;Сава Максимович Фёдоров&lt;/option&gt;&lt;option value=&quot;13&quot;&gt;Иван Владимирович Зверев&lt;/option&gt;&lt;option value=&quot;14&quot;&gt;Сергей Геннадьевич Безруков&lt;/option&gt;&lt;option value=&quot;15&quot;&gt;Владимир Владимирович Галкин&lt;/option&gt;&lt;option value=&quot;16&quot;&gt;Павел Анатольевич Максимов&lt;/option&gt;&lt;option value=&quot;17&quot;&gt;Sidney Sauer&lt;/option&gt;&lt;option value=&quot;18&quot;&gt;Eda Effertz Jr.&lt;/option&gt;&lt;option value=&quot;19&quot;&gt;Prof. Vincenzo Tremblay II&lt;/option&gt;&lt;option value=&quot;20&quot;&gt;Raina Lockman I&lt;/option&gt;&lt;option value=&quot;21&quot;&gt;Jay Stoltenberg&lt;/option&gt;&lt;option value=&quot;22&quot;&gt;Prof. Rachel Franecki I&lt;/option&gt;&lt;option value=&quot;23&quot;&gt;Willow D&amp;#039;Amore&lt;/option&gt;&lt;option value=&quot;24&quot;&gt;Prof. Jeffery Johnson II&lt;/option&gt;&lt;option value=&quot;25&quot;&gt;Edwina Hayes&lt;/option&gt;&lt;option value=&quot;26&quot;&gt;Nathen Keebler&lt;/option&gt;&lt;option value=&quot;27&quot;&gt;Raphael Abshire&lt;/option&gt;&lt;option value=&quot;28&quot;&gt;Kaleb Greenholt&lt;/option&gt;&lt;option value=&quot;29&quot;&gt;Anissa Hudson&lt;/option&gt;&lt;option value=&quot;30&quot;&gt;Prof. Darryl Howe I&lt;/option&gt;&lt;option value=&quot;31&quot;&gt;Trinity McDermott&lt;/option&gt;&lt;option value=&quot;32&quot;&gt;Unique Bartell&lt;/option&gt;&lt;option value=&quot;33&quot;&gt;Anthony Klein&lt;/option&gt;&lt;option value=&quot;34&quot;&gt;Mr. Waino Cummerata I&lt;/option&gt;&lt;option value=&quot;35&quot;&gt;Cleora Greenholt&lt;/option&gt;&lt;option value=&quot;36&quot;&gt;Lori Reilly&lt;/option&gt;&lt;option value=&quot;37&quot;&gt;Lindsay Bednar&lt;/option&gt;&lt;option value=&quot;38&quot;&gt;Edgardo Rohan&lt;/option&gt;&lt;option value=&quot;39&quot;&gt;Jodie Reichert MD&lt;/option&gt;&lt;option value=&quot;40&quot;&gt;Miss Elmira Price&lt;/option&gt;&lt;option value=&quot;41&quot;&gt;Rocky Lakin&lt;/option&gt;&lt;option value=&quot;42&quot;&gt;Jovani Schumm Sr.&lt;/option&gt;&lt;option value=&quot;43&quot;&gt;Devyn Gulgowski&lt;/option&gt;&lt;option value=&quot;44&quot;&gt;Prof. Rita Rodriguez&lt;/option&gt;&lt;option value=&quot;45&quot;&gt;Cathrine Conn&lt;/option&gt;&lt;option value=&quot;46&quot;&gt;Mr. Pietro Schuster IV&lt;/option&gt;&lt;option value=&quot;47&quot;&gt;Clare Bailey&lt;/option&gt;&lt;option value=&quot;48&quot;&gt;Barrett Lehner V&lt;/option&gt;&lt;option value=&quot;49&quot;&gt;alex&lt;/option&gt;&lt;/select&gt;
                        &lt;button class=&quot;bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3&quot; type=&quot;submit&quot;&gt;Применить&lt;/button&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
                            &lt;/div&gt;
            &lt;table class=&quot;table mt-5&quot;&gt;
                &lt;thead class=&quot;border-b-2 border-solid border-black text-left&quot;&gt;
                    &lt;tr&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;ID&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Статус&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Имя&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Автор&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Исполнитель&lt;/th&gt;
                        &lt;th scope=&quot;col&quot; class=&quot;py-2&quot;&gt;Дата создания&lt;/th&gt;
                                            &lt;/tr&gt;
                &lt;/thead&gt;
                &lt;tbody&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;1&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;завершен&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/1&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Исправить ошибку в какой-нибудь строке
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Eda Effertz Jr.&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Sidney Sauer&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;2&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;новый&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/2&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Допилить дизайн главной страницы
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Raina Lockman I&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Prof. Vincenzo Tremblay II&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;3&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/3&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Отрефакторить авторизацию
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Prof. Rachel Franecki I&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Jay Stoltenberg&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;4&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;в работе&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/4&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Доработать команду подготовки БД
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Prof. Jeffery Johnson II&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Willow D&amp;#039;Amore&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;5&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;завершен&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/5&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Пофиксить вон ту кнопку
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Nathen Keebler&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Edwina Hayes&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;6&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;завершен&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/6&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Исправить поиск
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Kaleb Greenholt&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Raphael Abshire&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;7&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;завершен&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/7&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Добавить интеграцию с облаками
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Prof. Darryl Howe I&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Anissa Hudson&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;8&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/8&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Выпилить лишние зависимости
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Unique Bartell&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Trinity McDermott&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;9&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/9&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Запилить сертификаты
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Mr. Waino Cummerata I&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Anthony Klein&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;10&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;в работе&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/10&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Выпилить игру престолов
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Lori Reilly&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Cleora Greenholt&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;11&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/11&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Пофиксить спеку во всех репозиториях
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Edgardo Rohan&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Lindsay Bednar&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;12&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/12&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Вернуть крошки
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Miss Elmira Price&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Jodie Reichert MD&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;13&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/13&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Установить Linux
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Jovani Schumm Sr.&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Rocky Lakin&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;14&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;на тестировании&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/14&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Потребовать прибавки к зарплате
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Prof. Rita Rodriguez&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Devyn Gulgowski&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                            &lt;tr class=&quot;border-b border-black text-left&quot;&gt;
                            &lt;td class=&quot;py-3&quot;&gt;15&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;в работе&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                &lt;a href=&quot;http://localhost/tasks/15&quot; class=&quot;text-blue-600 hover:text-blue-900&quot;&gt;
                                    Добавить поиск по фото
                                &lt;/a&gt;
                            &lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Mr. Pietro Schuster IV&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;Cathrine Conn&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;26.05.2025&lt;/td&gt;
                            &lt;td class=&quot;py-3&quot;&gt;
                                                                                            &lt;/td&gt;
                        &lt;/tr&gt;
                                    &lt;/tbody&gt;
            &lt;/table&gt;
            &lt;div class=&quot;mt-2&quot;&gt;
                &lt;nav role=&quot;navigation&quot; aria-label=&quot;Pagination Navigation&quot; class=&quot;flex items-center justify-between&quot;&gt;
        &lt;div class=&quot;flex justify-between flex-1 sm:hidden&quot;&gt;
                            &lt;span class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600&quot;&gt;
                    &amp;laquo; Назад
                &lt;/span&gt;
            
                            &lt;a href=&quot;http://localhost/tasks?page=2&quot; class=&quot;relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300&quot;&gt;
                    Вперёд &amp;raquo;
                &lt;/a&gt;
                    &lt;/div&gt;

        &lt;div class=&quot;hidden sm:flex-1 sm:flex sm:items-center sm:justify-between&quot;&gt;
            &lt;div&gt;
                &lt;p class=&quot;text-sm text-gray-700 leading-5 dark:text-gray-400&quot;&gt;
                    Showing
                                            &lt;span class=&quot;font-medium&quot;&gt;1&lt;/span&gt;
                        to
                        &lt;span class=&quot;font-medium&quot;&gt;15&lt;/span&gt;
                                        of
                    &lt;span class=&quot;font-medium&quot;&gt;16&lt;/span&gt;
                    results
                &lt;/p&gt;
            &lt;/div&gt;

            &lt;div&gt;
                &lt;span class=&quot;relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md&quot;&gt;
                    
                                            &lt;span aria-disabled=&quot;true&quot; aria-label=&quot;&amp;amp;laquo; Назад&quot;&gt;
                            &lt;span class=&quot;relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5 dark:bg-gray-800 dark:border-gray-600&quot; aria-hidden=&quot;true&quot;&gt;
                                &lt;svg class=&quot;w-5 h-5&quot; fill=&quot;currentColor&quot; viewBox=&quot;0 0 20 20&quot;&gt;
                                    &lt;path fill-rule=&quot;evenodd&quot; d=&quot;M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z&quot; clip-rule=&quot;evenodd&quot; /&gt;
                                &lt;/svg&gt;
                            &lt;/span&gt;
                        &lt;/span&gt;
                    
                    
                                            
                        
                        
                                                                                                                        &lt;span aria-current=&quot;page&quot;&gt;
                                        &lt;span class=&quot;relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600&quot;&gt;1&lt;/span&gt;
                                    &lt;/span&gt;
                                                                                                                                &lt;a href=&quot;http://localhost/tasks?page=2&quot; class=&quot;relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800&quot; aria-label=&quot;Go to page 2&quot;&gt;
                                        2
                                    &lt;/a&gt;
                                                                                                        
                    
                                            &lt;a href=&quot;http://localhost/tasks?page=2&quot; rel=&quot;next&quot; class=&quot;relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800&quot; aria-label=&quot;Вперёд &amp;amp;raquo;&quot;&gt;
                            &lt;svg class=&quot;w-5 h-5&quot; fill=&quot;currentColor&quot; viewBox=&quot;0 0 20 20&quot;&gt;
                                &lt;path fill-rule=&quot;evenodd&quot; d=&quot;M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z&quot; clip-rule=&quot;evenodd&quot; /&gt;
                            &lt;/svg&gt;
                        &lt;/a&gt;
                                    &lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/nav&gt;

            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
            &lt;/main&gt;

            &lt;footer class=&quot;sticky top-full bg-gray-700 shadow&quot;&gt;
                &lt;div x-data=&quot;{ open: false }&quot; class=&quot;bg-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
    &lt;nav class=&quot;flex h-16 justify-between hidden sm:-my-px sm:ms-10 sm:flex mt-2 space-x-8&quot;&gt;
        &lt;a class=&quot;inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-400 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/docs&quot;&gt;
    Api
&lt;/a&gt;
    &lt;/nav&gt;
&lt;/div&gt;
            &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETtasks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtasks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtasks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtasks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtasks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtasks" data-method="GET"
      data-path="tasks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtasks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtasks"
                    onclick="tryItOut('GETtasks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtasks"
                    onclick="cancelTryOut('GETtasks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtasks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>tasks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETtasks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTtasks">POST tasks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTtasks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/tasks" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"description\": \"Eius et animi quos velit et.\",
    \"status_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/tasks"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "description": "Eius et animi quos velit et.",
    "status_id": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/tasks';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
            'description' =&gt; 'Eius et animi quos velit et.',
            'status_id' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTtasks">
</span>
<span id="execution-results-POSTtasks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTtasks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTtasks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTtasks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTtasks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTtasks" data-method="POST"
      data-path="tasks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTtasks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTtasks"
                    onclick="tryItOut('POSTtasks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTtasks"
                    onclick="cancelTryOut('POSTtasks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTtasks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>tasks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTtasks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTtasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTtasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTtasks"
               value="architecto"
               data-component="body">
    <br>
<p>The name of the Task. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTtasks"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>The description of the Task. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status_id"                data-endpoint="POSTtasks"
               value="architecto"
               data-component="body">
    <br>
<p>The Status of the Task. The <code>id</code> of an existing record in the task_statuses table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assigned_to_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assigned_to_id"                data-endpoint="POSTtasks"
               value=""
               data-component="body">
    <br>
<p>The Executor of the Task. The <code>id</code> of an existing record in the users table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>labels</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="labels[0]"                data-endpoint="POSTtasks"
               data-component="body">
        <input type="text" style="display: none"
               name="labels[1]"                data-endpoint="POSTtasks"
               data-component="body">
    <br>
<p>The Labels of the Task must be relevant. The <code>id</code> of an existing record in the labels table.</p>
        </div>
        </form>

                    <h2 id="endpoints-GETtasks--id-">GET tasks/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETtasks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/tasks/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/tasks/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/tasks/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETtasks--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IlhQM2hZb3dJSU5MVmxYdzE3SW1qUHc9PSIsInZhbHVlIjoiZjRCV1lDUW1POUNnbGhMbWMrdC9tV2FBV3Q3YUhuOWV4THd0TmRXQXdYM0pEL1NFNUVWZHZYRFNwYVJpMG9Wb3creTc5TEQxbkFRL1ROU08yRkV1eVA2STNCMTNBQ2dOQXpUWTA2ZkxiRGpLZVlpTzhRUm1JNXhhcEJaV2srUUgiLCJtYWMiOiI4NjAxOTU3NjhhZDhmMjdlYTRlMjJmYWU5MjY0ZDQxODBkNTFjM2U1YmM5MTE0NTU2OWVlYzBiZWMxMmY5YmExIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; samesite=lax; taskmanager_session=eyJpdiI6Imxvd1d3emlWMXY1aDdQWHlBRThlRVE9PSIsInZhbHVlIjoiWTFWTjVFUldUWE9tam90cmpVZCtobXJKQ0ZMdGx2MjBvNms1Q3J3ZmpOSUM3THlqTlJrUnNBUmMzaER6ajZRb3oraTQvcFJWbHo0R2lyakhMS0NjMlpWYnVSdTNMSmdXNFFjYVVFYlRLTjB5QjFnTFpZMWsyRjQ3dElKc0p5SGYiLCJtYWMiOiI1NWQ0OGViYTVhMTFmMmFhMjQzMjY2ODE0ZjUxYWQ4YjdiNTVkMGI1MmZlZTI2MDE1NmJkZjg2YjYyNTNiMjRhIiwidGFnIjoiIn0%3D; expires=Mon, 26 May 2025 21:48:31 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;ru&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;rIJOYmswzGPfXrIXYG6w3A6kAcfwlqGiVVLe9U9q&quot;&gt;
        &lt;meta name=&quot;csrf-param&quot; content=&quot;_token&quot; /&gt;

        &lt;title&gt;Менеджер задач&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-DedrspOS.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CeCQbSnN.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-DedrspOS.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen bg-gray-100&quot;&gt;

            &lt;!-- Page Heading --&gt;
            &lt;header class=&quot;bg-white shadow&quot;&gt;
                &lt;nav x-data=&quot;{ open: false }&quot; class=&quot;bg-white border-b border-gray-100&quot;&gt;
    &lt;!-- Primary Navigation Menu --&gt;
    &lt;div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
        &lt;div class=&quot;flex justify-between h-16&quot;&gt;
            &lt;!-- Logo --&gt;
            &lt;div class=&quot;shrink-0 flex items-center&quot;&gt;
                &lt;a href=&quot;http://localhost&quot;&gt;
                    &lt;span class=&quot;self-center text-xl font-semibold whitespace-nowrap&quot;&gt;
                        Менеджер задач
                    &lt;/span&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;!-- Navigation Links --&gt;
            &lt;div class=&quot;hidden space-x-8 sm:-my-px sm:ms-10 sm:flex&quot;&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/tasks&quot;&gt;
    Задачи
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/task_statuses&quot;&gt;
    Статусы
&lt;/a&gt;
                &lt;a class=&quot;inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/labels&quot;&gt;
    Метки
&lt;/a&gt;
            &lt;/div&gt;
            &lt;div class=&quot;flex&quot;&gt;
                                    &lt;nav class=&quot;flex items-center justify-end gap-4&quot;&gt;
                                                    &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/login&quot;&gt;Вход&lt;/a&gt;

                                                            &lt;a class=&quot;block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-blue-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out bg-blue-500 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow&quot; href=&quot;http://localhost/register&quot;&gt;Регистрация&lt;/a&gt;
                                                                        &lt;/nav&gt;
                            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
            &lt;/header&gt;

            &lt;!-- Page Content --&gt;
            &lt;main class=&quot;max-w-screen-xl px-4 pt-20 pb-8 mx-auto&quot;&gt;
                                &lt;div class=&quot;mr-auto place-self-center lg:col-span-7&quot;&gt;
        &lt;div class=&quot;grid col-span-full&quot;&gt;
            &lt;div&gt;
                &lt;h1 class=&quot;max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-4xl&quot;&gt;
                Просмотр задачи: Исправить ошибку в какой-нибудь строке &lt;a href=&quot;http://localhost/tasks/1/edit&quot;&gt;⚙&lt;/a&gt;
                &lt;/h1&gt; 
                &lt;p class=&quot;my-1&quot;&gt;Имя: Исправить ошибку в какой-нибудь строке&lt;/p&gt;
                &lt;p class=&quot;my-1&quot;&gt;Статус: завершен&lt;/p&gt;
                &lt;p class=&quot;my-1&quot;&gt;Описание: Я тут ошибку нашёл, надо бы её исправить и так далее и так далее&lt;/p&gt;
            &lt;/div&gt;
                        &lt;div class=&quot;flex my-1&quot;&gt;
                    &lt;p class=&quot;mr-1&quot;&gt;Метки:&lt;/p&gt;
                                            &lt;div class=&quot;text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full me-1&quot;&gt;
                            &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;h-4 w-4&quot; fill=&quot;none&quot; viewBox=&quot;0 0 24 24&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;&gt;
                                &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z&quot;&gt;&lt;/path&gt;
                            &lt;/svg&gt;  
                            ошибка
                        &lt;/div&gt;
                                            &lt;div class=&quot;text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full me-1&quot;&gt;
                            &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;h-4 w-4&quot; fill=&quot;none&quot; viewBox=&quot;0 0 24 24&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;&gt;
                                &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z&quot;&gt;&lt;/path&gt;
                            &lt;/svg&gt;  
                            документация
                        &lt;/div&gt;
                                            &lt;div class=&quot;text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full me-1&quot;&gt;
                            &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;h-4 w-4&quot; fill=&quot;none&quot; viewBox=&quot;0 0 24 24&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;&gt;
                                &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z&quot;&gt;&lt;/path&gt;
                            &lt;/svg&gt;  
                            доработка
                        &lt;/div&gt;
                                    &lt;/div&gt;
               
        &lt;/div&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;a href=&quot;/tasks&quot; class=&quot;bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow&quot; target=&quot;_self&quot;&gt;
                К задачам
            &lt;/a&gt;
        &lt;/div&gt;
    &lt;/div&gt;
            &lt;/main&gt;

            &lt;footer class=&quot;sticky top-full bg-gray-700 shadow&quot;&gt;
                &lt;div x-data=&quot;{ open: false }&quot; class=&quot;bg-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8&quot;&gt;
    &lt;nav class=&quot;flex h-16 justify-between hidden sm:-my-px sm:ms-10 sm:flex mt-2 space-x-8&quot;&gt;
        &lt;a class=&quot;inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-400 transition duration-150 ease-in-out&quot; href=&quot;http://localhost/docs&quot;&gt;
    Api
&lt;/a&gt;
    &lt;/nav&gt;
&lt;/div&gt;
            &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETtasks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtasks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtasks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtasks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtasks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtasks--id-" data-method="GET"
      data-path="tasks/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtasks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtasks--id-"
                    onclick="tryItOut('GETtasks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtasks--id-"
                    onclick="cancelTryOut('GETtasks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtasks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>tasks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETtasks--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtasks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtasks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETtasks--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the task. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTtasks--id-">PUT tasks/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTtasks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/tasks/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"description\": \"Eius et animi quos velit et.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/tasks/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "description": "Eius et animi quos velit et."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/tasks/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
            'description' =&gt; 'Eius et animi quos velit et.',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTtasks--id-">
</span>
<span id="execution-results-PUTtasks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTtasks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTtasks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTtasks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTtasks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTtasks--id-" data-method="PUT"
      data-path="tasks/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTtasks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTtasks--id-"
                    onclick="tryItOut('PUTtasks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTtasks--id-"
                    onclick="cancelTryOut('PUTtasks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTtasks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>tasks/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>tasks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTtasks--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTtasks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTtasks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTtasks--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the task. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTtasks--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The name of the Task. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTtasks--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>The description of the Task. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="status_id"                data-endpoint="PUTtasks--id-"
               value=""
               data-component="body">
    <br>
<p>The Status of the Task. The <code>id</code> of an existing record in the task_statuses table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assigned_to_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assigned_to_id"                data-endpoint="PUTtasks--id-"
               value=""
               data-component="body">
    <br>
<p>The Executor of the Task. The <code>id</code> of an existing record in the users table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>labels</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="labels[0]"                data-endpoint="PUTtasks--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="labels[1]"                data-endpoint="PUTtasks--id-"
               data-component="body">
    <br>
<p>The Labels of the Task must be relevant. The <code>id</code> of an existing record in the labels table.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEtasks--id-">DELETE tasks/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEtasks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/tasks/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/tasks/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/tasks/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEtasks--id-">
</span>
<span id="execution-results-DELETEtasks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEtasks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEtasks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEtasks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEtasks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEtasks--id-" data-method="DELETE"
      data-path="tasks/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEtasks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEtasks--id-"
                    onclick="tryItOut('DELETEtasks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEtasks--id-"
                    onclick="cancelTryOut('DELETEtasks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEtasks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>tasks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEtasks--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEtasks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEtasks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEtasks--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the task. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTregister">Handle an incoming registration request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/register" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "email": "zbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/register';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'b',
            'email' =&gt; 'zbailey@example.net',
            'password' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTregister">
</span>
<span id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTregister" data-method="POST"
      data-path="register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTregister"
                    onclick="tryItOut('POSTregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTregister"
                    onclick="cancelTryOut('POSTregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTregister"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTregister"
               value="b"
               data-component="body">
    <br>
<p>Количество символов в значении поля value не может превышать 255. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTregister"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Значение поля value должно быть действительным электронным адресом. Количество символов в значении поля value не может превышать 255. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTregister"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTlogin">Handle an incoming authentication request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/login" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/login';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'gbailey@example.net',
            'password' =&gt; '|]|{+-',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTlogin">
</span>
<span id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogin" data-method="POST"
      data-path="login"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogin"
                    onclick="tryItOut('POSTlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogin"
                    onclick="cancelTryOut('POSTlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTlogin"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTlogin"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Значение поля value должно быть действительным электронным адресом. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTlogin"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTlogout">Destroy an authenticated session.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTlogout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTlogout">
</span>
<span id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogout" data-method="POST"
      data-path="logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogout"
                    onclick="tryItOut('POSTlogout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogout"
                    onclick="cancelTryOut('POSTlogout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTlogout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
