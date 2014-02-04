{{ if posts }}

<div class="row" id="posts">
    {{ posts }}

    {{ if count % 3 == 1 }}
    <div class="row">
        {{ endif }}

        <div class="col-md-4 col-sm-4">
            <div class="post thumbnail well">
                <div class="meta text-left">
                    <p class="title"><a href="{{ url }}">{{ title }}</a></p>
                </div>

                <div class="preview text-left">
                    <p>
                        {{ helper:character_limiter string=preview limit="125" }}
                    </p>
                    <p>
                        <a href="{{ url }}">{{ theme:lang lang="theme" line="blog:label:read_more" default="Read more" }}</a>
                    </p>
                </div>

            </div>
        </div>

        {{ if count % 3 == 0 }}
    </div>
    {{ endif }}

    {{ if last == 1 }}
    {{ if count % 3 != 0 }}
</div>
{{ endif }}

</div>
{{ endif }}

{{ /posts }}

{{ pagination }}

{{ else }}

{{ theme:lang lang="theme" line="blog:message:no_posts" default="No posts" }}

{{ endif }}
