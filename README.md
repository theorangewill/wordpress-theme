# Wordpress theme

This is a Wordpress theme that I made to learn web development. I learned HTML, CSS, php and Wordpress, and discovered tools like npm, gulp, sass, Wordpress plugins and others.

This template has a blog style with a lesson topology.

## Home

The home page has a simple menu and a category menu with huge images.
The posts is a catalog using [Masonry tool](https://masonry.desandro.com/).

![home page](/img/homepage.png)

The categories menu is customized in the Wordpress Theme Custom> Categories Menu.
![category menu](/img/menuoptions.png)

## Categories and lessons

The theme has the classic post type and a custom type called lessons.
The classic post have two taxonomies: category and tag. While the lessons have: subject and tag.

A category has children categories.
Below is the page of the categories without parent. This page has a title and description of the category, followed by a catalog of children categories, that have images.
![parent category page](/img/categorypage.png)

The children have the template below. This page shows posts with this category. In the header, there is the parent category (upper left corner) and below the children categories. In the example, the page is for the IA category, which is a child of Computing and has Neural Network as a child.
![children category page](/img/categorychildrenpage.png)

Lessons have the same templates.

## Posts

The post has the template below. It has title, description, the text and footer.
![post page](/img/postpage.png)

The footer contains references, list of tags, the publication and update dates, and the author. The author has a popover that shows a description.
![post footer](/img/postfooter.png)

It is possible to create a table of contents.
![post table content](/img/tablecontents.png)

The table is created using commands in the text:
![post table content commands](/img/tablecontentscommands.png)
![post table content options](/img/tablecontentsoptions.png)

Another commmand is the popover tip.
![post text tip](/img/texttip.png)
![post text tip](/img/texttipcommand.png)

This is the template for the comments:
![post comments](/img/comments.png)

### Page

Page is another default Wordpress post type and has a simple template:
![page](/img/page.png)



## Search 

The search page is similar to the others.
![search page](/img/searchpage.png)

## Author

Each author has a page with information about them. The page has an avatar, description, email image and links. The user can add Interests and Experiences. A list of tags and posts that the author has written are also shown.
![author page](/img/authorpage.png)

The admin can change the name and the box information in the Wordpress menu Theme Options > Options.
![author box info](/img/authorboxinfo.png)
![author box info options](/img/authorboxinfooptions.png)

The author can add and remove the interests and experiences in the Wordpress menu Author Fields > All Author Fields. These fields are made using the [Advanced Custom Fields](https://www.advancedcustomfields.com/) plugin.
![author fields](/img/authorfields.png)

The description is shown as:
![author interests](/img/authorinterests.png)
![author experiences ](/img/authorexperiences.png)

## Customize

The admin can also use the Wordpress Customize to alter colors, and header and footer logo. 
![customize](/img/customize.png)

