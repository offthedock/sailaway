<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
      Discover Vagrant Boxes -
      Vagrant Cloud
    </title>

    <link rel="stylesheet" media="all" href="/help/static/vagrant/application-f5d685617807873962ebdc5ad9261c7db5012e73cb9a539d.css">
    <meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="E6nQylNrYrC91M7KTGAXauKogHyLdUHKCJIfRggRbRmPNQhCctzzAoDNrvFg7Igi5+/7fzvgQYegacpz3eHZQQ==">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Vagrant Cloud by HashiCorp">
    <meta name="twitter:url" content="https://app.vagrantup.com">

    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="Vagrant Cloud by HashiCorp">
    <meta property="og:description" content="Vagrant Cloud by HashiCorp">
    <meta property="og:url" content="https://app.vagrantup.com">
    <meta property="og:site_name" content="Vagrant Cloud by HashiCorp">

    <link rel="apple-touch-icon" href="https://app.vagrantup.com/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://app.vagrantup.com/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="https://app.vagrantup.com/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://app.vagrantup.com/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://app.vagrantup.com/favicon-32x32.png">
    <link rel="mask-icon" href="https://app.vagrantup.com/safari-pinned-tab.svg" color="#1563FF">
    <meta name="msapplication-TileColor" content="#1563FF">
    <meta name="msapplication-TileImage" content="/mstile-150x150.png">
    <meta name="theme-color" content="#1563FF">

    <script async="" src="/help/static/vagrant/analytics.js"></script><script src="/help/static/vagrant/application-d926c034f15c2fb3f06276d6e7e132e6bdff0f919a192d39e.js"></script>
  </head>

  <body>

    <div class="container-fullwidth">
      <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <div class="navbar-brand">
        <a href="https://app.vagrantup.com/">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 356 68" class="logo">
  <path class="shadow" d="M65.315 11.378l-19.93 48.814-12.727 7.34V48.766l5.938-4.092L50.472 19.05v-5.217l14.843-8.64v6.184zm-32.657 24.03v7.455l-5.94 2.937-11.875-26.748v-5.218l8.846-5.117.06.035v5.874l8.905 20.78z"></path>
  <path class="front" d="M56.417 0L41.574 8.693l-.006-.005v5.937l-8.91 20.78v6.947l-5.94 3.447-11.875-26.75v-5.23l8.91-5.124L8.903 0 0 5.194v6.372L20.048 60.25l12.61 7.28V49.24l5.938-3.44-.076-.047 11.952-26.7v-5.22l.006-.01 14.843-8.63"></path>
  <path class="text" d="M88 13.94V9.56h-4v4.38h-2V3.42h2v4.41h4V3.42h2v10.52h-2zm9.54 0H95.9l-.15-.51c-.705.438-1.52.67-2.35.67-1.44 0-2.06-1-2.06-2.26 0-1.54.7-2.13 2.3-2.13h1.9v-.8c0-.84-.24-1.14-1.51-1.14-.736.006-1.47.083-2.19.23l-.24-1.45c.884-.235 1.795-.356 2.71-.36 2.48 0 3.21.84 3.21 2.74l.02 5.01zm-2-2.87h-1.46c-.65 0-.83.17-.83.75s.18.76.8.76c.52-.007 1.032-.14 1.49-.39v-1.12zm6.13 3c-.926-.015-1.846-.163-2.73-.44l.28-1.45c.766.21 1.556.322 2.35.33.88 0 1-.19 1-.76 0-.57-.1-.7-1.38-1-1.93-.45-2.16-.92-2.16-2.38s.7-2.2 3-2.2c.797 0 1.592.086 2.37.26L104.17 8c-.716-.138-1.44-.22-2.17-.25-.86 0-1 .19-1 .65s0 .65 1.12.92c2.21.56 2.42.84 2.42 2.4s-.49 2.38-2.87 2.38v-.03zm9.06-.16V8.64c0-.41-.18-.61-.63-.61-.722.078-1.42.296-2.06.64v5.27h-2V3.27l2 .3v3.36c.902-.442 1.886-.69 2.89-.73 1.31 0 1.79.89 1.79 2.24v5.5l-1.99-.03zm3.64-8.66V3.42h2v1.86l-2-.03zm0 8.66V6.35h2v7.59l-2-.03zm3.56-7.53c0-1.9 1.15-3 3.85-3 .99 0 1.977.113 2.94.34l-.23 1.7c-.872-.157-1.754-.244-2.64-.26-1.41 0-1.87.47-1.87 1.57v4c0 1.11.45 1.57 1.87 1.57.886-.016 1.768-.103 2.64-.26l.23 1.7c-.963.227-1.95.34-2.94.34-2.69 0-3.85-1.11-3.85-3v-4.7zm11.16 7.68c-2.71 0-3.44-1.43-3.44-3V9.19c0-1.56.73-3 3.44-3s3.44 1.43 3.44 3v1.91c0 1.56-.73 3-3.44 3v-.04zm0-6.28c-1.05 0-1.46.45-1.46 1.31v2c0 .86.41 1.31 1.46 1.31s1.46-.45 1.46-1.31v-2c0-.82-.41-1.27-1.46-1.27v-.04zm9 .12c-.723.314-1.422.68-2.09 1.1v4.89h-2V6.35h1.67l.13.84c.648-.42 1.347-.757 2.08-1l.21 1.71zm7.91 3.52c0 1.68-.78 2.68-2.61 2.68-.71-.007-1.415-.08-2.11-.22V17l-2 .3V6.35h1.57l.19.64c.73-.52 1.604-.795 2.5-.79 1.59 0 2.43.9 2.43 2.63l.03 2.59zm-4.72.86c.576.123 1.162.19 1.75.2.71 0 1-.33 1-1v-2.7c0-.62-.24-1-1-1-.65.022-1.276.265-1.77.69l.02 3.81zM96.25 46.742l-7.728-26.64h-6.288l9.552 31.968h8.928l9.552-31.968h-6.288l-7.728 26.64zm33.248-10.08V52.07h-4.8l-.432-1.584c-2.112 1.392-4.608 2.064-6.96 2.064-4.272 0-6.096-2.928-6.096-6.96 0-4.752 2.064-6.576 6.816-6.576h5.616v-2.448c0-2.592-.72-3.504-4.464-3.504-2.112 0-4.416.288-6.48.72l-.72-4.464c2.208-.672 5.424-1.104 8.016-1.104 7.344 0 9.504 2.592 9.504 8.448zm-5.856 10.032v-3.456h-4.32c-1.92 0-2.448.528-2.448 2.304 0 1.632.528 2.352 2.352 2.352 1.728 0 3.312-.576 4.416-1.2zm19.664-.864c-.48 0-.912 0-1.344-.048-.768.48-1.392 1.152-1.392 1.872 0 .624.384.912 1.296 1.008 2.592.288 4.032.432 6.768.72 3.792.432 4.992 2.304 4.992 5.664 0 4.992-1.824 6.96-10.56 6.96-2.688 0-6.384-.384-9.024-1.2l.72-4.368c2.496.624 5.136 1.008 7.872 1.008 4.656 0 5.568-.336 5.568-1.872 0-1.44-.432-1.68-2.208-1.872-2.688-.288-3.792-.432-6.768-.768-3.312-.384-4.608-1.488-4.608-4.464 0-1.92 1.296-3.168 2.448-3.984-2.16-1.296-3.168-3.456-3.168-6.288V35.99c.096-4.848 2.64-7.776 9.408-7.776 1.584 0 2.832.192 3.984.48h7.2v2.928c-.816.24-1.776.48-2.592.72.528 1.008.816 2.304.816 3.648v2.208c0 4.752-2.88 7.632-9.408 7.632zm3.936-9.648c0-2.208-1.008-3.264-3.936-3.264-2.88 0-3.888 1.056-3.888 3.264v1.776c0 2.304 1.152 3.168 3.888 3.168 2.784 0 3.936-.912 3.936-3.168v-1.776zm22.64-7.968c-2.064.576-4.848 2.208-6.144 3.072l-.384-2.592h-4.944V52.07h5.856V36.998c2.112-1.344 3.936-2.4 6.192-3.408l-.576-5.376zm21.296 8.448V52.07h-4.8l-.432-1.584c-2.112 1.392-4.608 2.064-6.96 2.064-4.272 0-6.096-2.928-6.096-6.96 0-4.752 2.064-6.576 6.816-6.576h5.616v-2.448c0-2.592-.72-3.504-4.464-3.504-2.112 0-4.416.288-6.48.72l-.72-4.464c2.208-.672 5.424-1.104 8.016-1.104 7.344 0 9.504 2.592 9.504 8.448zm-5.856 10.032v-3.456h-4.32c-1.92 0-2.448.528-2.448 2.304 0 1.632.528 2.352 2.352 2.352 1.728 0 3.312-.576 4.416-1.2zm31.376 5.376V35.126c0-4.176-1.392-6.912-5.28-6.912-2.736 0-6.432 1.008-9.36 2.448l-.576-1.968h-4.464V52.07h5.856V35.846c2.112-1.104 4.656-1.968 6.096-1.968 1.344 0 1.872.624 1.872 1.872v16.32h5.856zm17.84-4.896c-1.008.288-2.064.48-2.928.48-1.536 0-2.112-.816-2.112-2.064V33.35h5.616l.384-4.656h-6V22.07l-5.856.816v5.808h-3.504v4.656h3.504v13.008c0 4.176 2.16 6.192 6.432 6.192 1.488 0 3.888-.384 5.136-.912l-.672-4.464zm14.08-3.888c0 5.856 3.408 9.264 11.376 9.264 2.976 0 6.048-.384 8.688-1.056l-.672-5.232c-2.592.48-5.616.816-7.824.816-4.176 0-5.52-1.44-5.52-4.848V29.942c0-3.408 1.344-4.848 5.52-4.848 2.208 0 5.232.336 7.824.816l.672-5.232c-2.64-.672-5.712-1.056-8.688-1.056-7.968 0-11.376 3.408-11.376 9.264v14.4zm31.04 8.784V18.326l-5.856.816V52.07h5.856zm25.616-8.736c0 4.8-2.16 9.216-10.176 9.216s-10.176-4.416-10.176-9.216V37.43c0-4.8 2.16-9.216 10.176-9.216s10.176 4.416 10.176 9.216v5.904zm-5.856-6.096c0-2.64-1.2-4.032-4.32-4.032s-4.32 1.392-4.32 4.032v6.288c0 2.64 1.2 4.032 4.32 4.032s4.32-1.392 4.32-4.032v-6.288zm10.88-8.544v16.944c0 4.176 1.392 6.912 5.28 6.912 2.736 0 6.432-1.008 9.36-2.448l.576 1.968h4.464V28.694h-5.856v16.224c-2.112 1.104-4.656 1.968-6.096 1.968-1.344 0-1.872-.624-1.872-1.872v-16.32h-5.856zm25.04 15.744V36.47c0-5.184 2.304-8.256 7.728-8.256 2.064 0 4.416.288 6.24.672v-9.744l5.856-.816V52.07h-4.656l-.576-1.968c-2.064 1.488-4.464 2.448-7.392 2.448-4.704 0-7.2-2.784-7.2-8.112zm13.968 1.008V33.83c-1.536-.336-3.504-.624-5.184-.624-2.112 0-2.928 1.008-2.928 3.12v8.256c0 1.92.72 2.976 2.88 2.976 1.92 0 3.984-.96 5.232-2.112z"></path>
</svg>

</a>      </div>
    </div>

    <ul class="nav navbar-nav">

      <li class="active" role="presentation"><a href="https://app.vagrantup.com/boxes/search">Search <span class="sr-only">(current)</span></a></li>
      <li role="presentation"><a href="https://app.vagrantup.com/pricing">Pricing</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li role="presentation"><a target="_blank" href="https://www.vagrantup.com/">Vagrant</a></li>
      <li role="presentation"><a target="_blank" href="https://www.vagrantup.com/docs/vagrant-cloud/">Help</a></li>

        <li role="presentation"><a href="https://app.vagrantup.com/account/new">Create an Account</a></li>
        <li role="presentation"><a href="https://app.vagrantup.com/session">Sign In</a></li>
    </ul>
  </div>
</nav>

    </div>

    <div class="container">






<div class="page-header text-center">
  <h2>Discover Vagrant Boxes</h2>
</div>

<div>
  <form action="/boxes/search" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
    <input type="hidden" name="sort" id="sort" value="downloads">
    <input type="hidden" name="provider" id="provider">

    <div class="form-group has-feedback">
      <input type="text" name="q" id="q" class="form-control input-lg" placeholder="Search for boxes by operating system, included software, architecture and more" autofocus="autofocus">
      <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
    </div>

    <button type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;">Submit</button>
</form></div>

<div>
  <div class="search-filters clearfix">
    <div class="search-filters-providers">
      <small>Provider</small>
      <div class="btn-group btn-group-xs">
          <a class="btn btn-primary" title="Show all boxes" href="https://app.vagrantup.com/boxes/search">any</a>

            <a class="btn btn-default" title="Only show boxes with the virtualbox" href="https://app.vagrantup.com/boxes/search?provider=virtualbox">virtualbox</a>
            <a class="btn btn-default" title="Only show boxes with the vmware" href="https://app.vagrantup.com/boxes/search?provider=vmware">vmware</a>
            <a class="btn btn-default" title="Only show boxes with the libvirt" href="https://app.vagrantup.com/boxes/search?provider=libvirt">libvirt</a>
        <div class="btn-group btn-group-xs">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            more <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
                <li>
                  <a title="Only show boxes with the aws" href="https://app.vagrantup.com/boxes/search?provider=aws">aws</a>
                </li>
                <li>
                  <a title="Only show boxes with the cloudstack" href="https://app.vagrantup.com/boxes/search?provider=cloudstack">cloudstack</a>
                </li>
                <li>
                  <a title="Only show boxes with the digitalocean" href="https://app.vagrantup.com/boxes/search?provider=digitalocean">digitalocean</a>
                </li>
                <li>
                  <a title="Only show boxes with the docker" href="https://app.vagrantup.com/boxes/search?provider=docker">docker</a>
                </li>
                <li>
                  <a title="Only show boxes with the google" href="https://app.vagrantup.com/boxes/search?provider=google">google</a>
                </li>
                <li>
                  <a title="Only show boxes with the hyperv" href="https://app.vagrantup.com/boxes/search?provider=hyperv">hyperv</a>
                </li>
                <li>
                  <a title="Only show boxes with the libvirt" href="https://app.vagrantup.com/boxes/search?provider=libvirt">libvirt</a>
                </li>
                <li>
                  <a title="Only show boxes with the lxc" href="https://app.vagrantup.com/boxes/search?provider=lxc">lxc</a>
                </li>
                <li>
                  <a title="Only show boxes with the openstack" href="https://app.vagrantup.com/boxes/search?provider=openstack">openstack</a>
                </li>
                <li>
                  <a title="Only show boxes with the parallels" href="https://app.vagrantup.com/boxes/search?provider=parallels">parallels</a>
                </li>
                <li>
                  <a title="Only show boxes with the qemu" href="https://app.vagrantup.com/boxes/search?provider=qemu">qemu</a>
                </li>
                <li>
                  <a title="Only show boxes with the rackspace" href="https://app.vagrantup.com/boxes/search?provider=rackspace">rackspace</a>
                </li>
                <li>
                  <a title="Only show boxes with the softlayer" href="https://app.vagrantup.com/boxes/search?provider=softlayer">softlayer</a>
                </li>
                <li>
                  <a title="Only show boxes with the veertu" href="https://app.vagrantup.com/boxes/search?provider=veertu">veertu</a>
                </li>
                <li>
                  <a title="Only show boxes with the virtualbox" href="https://app.vagrantup.com/boxes/search?provider=virtualbox">virtualbox</a>
                </li>
                <li>
                  <a title="Only show boxes with the vmware" href="https://app.vagrantup.com/boxes/search?provider=vmware">vmware</a>
                </li>
                <li>
                  <a title="Only show boxes with the vmware_desktop" href="https://app.vagrantup.com/boxes/search?provider=vmware_desktop">vmware_desktop</a>
                </li>
                <li>
                  <a title="Only show boxes with the vmware_fusion" href="https://app.vagrantup.com/boxes/search?provider=vmware_fusion">vmware_fusion</a>
                </li>
                <li>
                  <a title="Only show boxes with the vmware_ovf" href="https://app.vagrantup.com/boxes/search?provider=vmware_ovf">vmware_ovf</a>
                </li>
                <li>
                  <a title="Only show boxes with the vmware_workstation" href="https://app.vagrantup.com/boxes/search?provider=vmware_workstation">vmware_workstation</a>
                </li>
                <li>
                  <a title="Only show boxes with the vsphere" href="https://app.vagrantup.com/boxes/search?provider=vsphere">vsphere</a>
                </li>
                <li>
                  <a title="Only show boxes with the xenserver" href="https://app.vagrantup.com/boxes/search?provider=xenserver">xenserver</a>
                </li>
          </ul>
        </div>

      </div>
    </div>

    <div class="search-filters-sort">
      <small>Sort by</small>
      <div class="btn-group btn-group-xs">
            <a class="btn btn-primary" title="Sort boxes by Downloads" href="https://app.vagrantup.com/boxes/search">Downloads</a>
            <a class="btn btn-default" title="Sort boxes by Recently Created" href="https://app.vagrantup.com/boxes/search?order=desc&amp;page=1&amp;sort=created">Recently Created</a>
            <a class="btn btn-default" title="Sort boxes by Recently Updated" href="https://app.vagrantup.com/boxes/search?order=desc&amp;page=1&amp;sort=updated">Recently Updated</a>
      </div>
    </div>
  </div>


  <ul class="media-list">
      <a class="list-group-item " href="https://app.vagrantup.com/ubuntu/boxes/trusty64">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="ubuntu/trusty64" src="/help/static/vagrant/1e8d3d421d018a7d812b3968bb4a3a6b.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  ubuntu/trusty64
                  <small>
                    20190514.0.0
                  </small>
                </h4>

                <div>
                  Official Ubuntu Server 14.04 LTS (Trusty Tahr) builds (End of standard support)
                </div>
              </div>

              <div class="col-md-3">
                <span title="virtualbox">
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    30,592,541
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    over 2 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/laravel/boxes/homestead">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="laravel/homestead" src="/help/static/vagrant/f30ff8ad2367afd407a1678e7d8d851f.jpeg">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  laravel/homestead
                  <small>
                    12.1.0
                  </small>
                </h4>

                <div>
                  Official Laravel local development box.
                </div>
              </div>

              <div class="col-md-3">
                <span title="hyperv, parallels, virtualbox, vmware, and vmware_desktop">
                    <span class="label label-inline label-outline">
                      hyperv
                    </span>
                    <span class="label label-inline label-outline">
                      parallels
                    </span>
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>
                    <span class="label label-inline label-outline">
                      vmware
                    </span>

                    <small>
                      and 1 more providers
                    </small>
                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    14,418,715
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    about 2 months ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/hashicorp/boxes/precise64">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="hashicorp/precise64" src="/help/static/vagrant/baec19bad76c56c6afb4fc5e1fa85a93.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  hashicorp/precise64
                  <small>
                    1.1.0
                  </small>
                </h4>

                <div>
                  A standard Ubuntu 12.04 LTS 64-bit box.
                </div>
              </div>

              <div class="col-md-3">
                <span title="hyperv, virtualbox, and vmware_fusion">
                    <span class="label label-inline label-outline">
                      hyperv
                    </span>
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>
                    <span class="label label-inline label-outline">
                      vmware_fusion
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    6,797,457
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    about 8 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/centos/boxes/7">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="centos/7" src="/help/static/vagrant/11177a887aefcbb1ef9dbeadd8579074.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  centos/7
                  <small>
                    2004.01
                  </small>
                </h4>

                <div>
                  CentOS Linux 7 x86_64 Vagrant Box
                </div>
              </div>

              <div class="col-md-3">
                <span title="hyperv, libvirt, virtualbox, vmware, vmware_desktop, vmware_fusion, and vmware_workstation">
                    <span class="label label-inline label-outline">
                      hyperv
                    </span>
                    <span class="label label-inline label-outline">
                      libvirt
                    </span>
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>
                    <span class="label label-inline label-outline">
                      vmware
                    </span>

                    <small>
                      and 3 more providers
                    </small>
                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    5,459,906
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    almost 2 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/ubuntu/boxes/xenial64">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="ubuntu/xenial64" src="/help/static/vagrant/1e8d3d421d018a7d812b3968bb4a3a6b.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  ubuntu/xenial64
                  <small>
                    20211001.0.0
                  </small>
                </h4>

                <div>
                  Official Ubuntu 16.04 LTS (Xenial Xerus) builds (End of standard support)
                </div>
              </div>

              <div class="col-md-3">
                <span title="virtualbox">
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    3,495,129
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    7 months ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/puphpet/boxes/ubuntu1404-x64">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="puphpet/ubuntu1404-x64" src="/help/static/vagrant/1786d63e058f7ab194f5e0dfa24ca19b.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  puphpet/ubuntu1404-x64
                  <small>
                    20161102
                  </small>
                </h4>

                <div>
                  Ubuntu Trusty 14.04 LTS x64
                </div>
              </div>

              <div class="col-md-3">
                <span title="parallels, virtualbox, and vmware_desktop">
                    <span class="label label-inline label-outline">
                      parallels
                    </span>
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>
                    <span class="label label-inline label-outline">
                      vmware_desktop
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    2,510,988
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    over 5 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/debian/boxes/jessie64">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="debian/jessie64" src="/help/static/vagrant/35afe92e6b5a11cadff690b3a94406d8.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  debian/jessie64
                  <small>
                    8.11.1
                  </small>
                </h4>

                <div>
                  Vanilla Debian 8 "Jessie"
                </div>
              </div>

              <div class="col-md-3">
                <span title="libvirt, lxc, and virtualbox">
                    <span class="label label-inline label-outline">
                      libvirt
                    </span>
                    <span class="label label-inline label-outline">
                      lxc
                    </span>
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    2,372,351
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    almost 3 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/hashicorp/boxes/precise32">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="hashicorp/precise32" src="/help/static/vagrant/baec19bad76c56c6afb4fc5e1fa85a93.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  hashicorp/precise32
                  <small>
                    1.0.0
                  </small>
                </h4>

                <div>
                  A standard Ubuntu 12.04 LTS 32-bit box.
                </div>
              </div>

              <div class="col-md-3">
                <span title="virtualbox">
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    2,294,005
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    about 8 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/scotch/boxes/box">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="scotch/box" src="/help/static/vagrant/f705a219f4023ba201fec8163526facd.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  scotch/box
                  <small>
                    3.5
                  </small>
                </h4>

                <div>
                  Just a dead-simple local LAMP stack for developers that just works.
                </div>
              </div>

              <div class="col-md-3">
                <span title="virtualbox">
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    2,088,998
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    about 4 years ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>      <a class="list-group-item " href="https://app.vagrantup.com/bento/boxes/ubuntu-16.04">
        <li class="media">
          <div class="media-left hidden-xs">
            <img class="gravatar" alt="bento/ubuntu-16.04" src="/help/static/vagrant/c27f3979b2a62841d450f6fd6127a7de.png">
          </div>
          <div class="media-body">
            <div class="row">
              <div class="col-md-5">
                <h4>
                  bento/ubuntu-16.04
                  <small>
                    202112.19.0
                  </small>
                </h4>

                <div>
                  Vanilla Ubuntu 16.04 Vagrant box created with Bento by Chef
                </div>
              </div>

              <div class="col-md-3">
                <span title="hyperv, parallels, virtualbox, and vmware_desktop">
                    <span class="label label-inline label-outline">
                      hyperv
                    </span>
                    <span class="label label-inline label-outline">
                      parallels
                    </span>
                    <span class="label label-inline label-outline">
                      virtualbox
                    </span>
                    <span class="label label-inline label-outline">
                      vmware_desktop
                    </span>

                  <span>
              </span></span></div>

              <div class="col-md-2">
                <div>
                  Downloads
                </div>

                <div>
                  <strong>
                    1,845,118
                  </strong>
                </div>
              </div>

              <div class="col-md-2">
                <div>
                  Released
                </div>

                <div>
                  <strong>
                    4 months ago
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </li>
</a>  </ul>
</div>

<div>
  <a class="btn btn-default" disabled="disabled" href="https://app.vagrantup.com/boxes/search?page=0">Previous</a>
  <a class="btn btn-default pull-right" href="https://app.vagrantup.com/boxes/search?page=2">Next</a>
</div>

      <footer class="hidden-print">
  <div class="text-center">
    <p>
      </p><ul class="list-unstyled list-inline">
        <li><a href="https://app.vagrantup.com/">Homepage</a></li>
        <li><a href="https://app.vagrantup.com/terms">Terms</a></li>
        <li><a href="https://app.vagrantup.com/dmca">DMCA</a></li>
        <li><a target="_blank" href="https://hashicorp.com/privacy">Privacy</a></li>
        <li><a href="https://app.vagrantup.com/security">Security</a></li>
        <li><a target="_blank" href="https://www.vagrantup.com/docs/vagrant-cloud/api.html">API</a></li>
      </ul>
    <p></p>

    <p>
      <a target="_blank" href="https://www.hashicorp.com/?utm_source=vagrantcloud">
        <img src="/help/static/vagrant/logo-3b74e7dedd88ad0f4b5925d9eaf460643b7ee2bb6cb5da154a113a6.svg" width="128">
</a>    </p>

    <p>
      © 2022
    </p>
  </div>
</footer>

    </div>

      <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-15091924-2', 'auto');
    ga('send', 'pageview');
  </script>



</body></html>
