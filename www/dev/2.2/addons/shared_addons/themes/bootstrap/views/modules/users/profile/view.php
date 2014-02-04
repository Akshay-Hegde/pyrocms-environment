{{# we use _user:id as that is the id passed to this view. Different than the logged in user's user:id #}}

{{ streams:profiles namespace="users" where="`user_id`='<?php echo $_user->id;?>'" }}
<div class="row" id="profile">
    <div class="col-md-2 text-center avatar">
        {{ files:listing folder="36" type="i" tagged="<?php echo $_user->display_name;?>" }}
        <img src="{{ url:site }}files/thumb/{{ id }}" alt="{{ description }}" title="{{ display_name }}" class="avatar img-rounded" width="125" />
        {{ /files:listing }}
    </div>
    <div class="col-md-10">
        <h1>{{ display_name }}</h1>
        <p>{{ bio }}</p>
    </div>
</div>
{{ /streams:profiles }}

{{ widgets:area slug="social-share" }}

<div class="row" id="posts">
    {{ blog:posts include=_user:id include_by="created_by" order_by="created" sort="desc" }}

    {{ if count % 3 == 1 }}
    <div class="row">
        {{ endif }}
        <div class="col-md-4 post">
            <div class="thumbnail">
                <a href="{{ url }}"><img src="{{ image:image }}" alt="{{ title }}"></a>

                <div class="row headlines">
                    <div class="col-md-2">
                        <div class="date">
                            <div class="day">{{ helper:date timestamp=created format="d" }}</div> 
                            <div class="month">{{ helper:date timestamp=created format="M" }}</div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="meta">
                            <p class="title"><a href="{{ url }}">{{ title }}</a></p>
                            <p class="author"><a href="{{ url:site }}autores/{{ user:username user_id=author_id }}">{{ user:display_name user_id=author_id }}</a></p>
                        </div>
                    </div>
                </div>

                <div class="meta">
                    {{ if category }}
                    <p class="category"><a href="{{ url:site }}blog/category/{{ category:slug }}">{{ category:title }}</a>
                    </p>
                    {{ endif }}
                </div>

                <div class="preview">
                    <p>
                        {{ helper:substr string=preview start="0" length="200" }}
                        <a href="{{ url }}">{{ helper:lang line="blog:read_more_label" }}</a>
                    </p>
                </div>

            </div>
        </div>

        {{ if count % 3 == 0 or last == 1 }}
    </div>
    {{ endif }}

    {{ /blog:posts }}
</div>

<br />
{{ widgets:area slug="comments" }}