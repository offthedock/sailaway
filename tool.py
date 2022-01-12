#!/usr/bin/env python3

import os,sys,click

#*******************************************************************************

def shell(command, *argument, **options):
    args = lambda value: ('"%s"' % value) if (" " in value) else value

    stmt = ' '.join([command] + [args(x) for x in argument])

    os.system(stmt)

#*******************************************************************************

@click.group()
@click.option('--debug/--no-debug', default=False)
@click.pass_context
def cli(ctx,debug):
    ctx.obj['bpath'] = os.path.dirname(__file__)
    ctx.obj['rpath'] = lambda *x: os.path.join(ctx.obj['bpath'], *x)
    ctx.obj['bpath'] = "/media/chromebook/OffTheDock"

    click.echo('Base dir : %(bpath)s' % ctx.obj)

    ctx.obj['debug'] = debug

    #click.echo(f"Debug mode is {'on' if debug else 'off'}")

################################################################################

@cli.command('code')
@click.argument('source', nargs=1, default='/git/fossil')
@click.argument('target', nargs=1, default='/git/coding')
@click.option('--clone/--no-git', default=False)
@click.pass_context
def developing(ctx,source,target,clone):
    framework = {
        'python': ['flask','django','scrapy','airflow'],
        'nodejs': ['express','hubot','leveldb','parse'],
        'php':    ['laravel','wordpress'],
    }
    modulars = {
        'abstract':  ['dataset','filesystem','network','vocabular'],
        'library':   ['autobahn','graphql','linguist','mosquitto'],
        #'abstract':  ['cloud','dataset','filesystem','network','operating','runtime','vocabular'],
        #'operating': ['android','chrome','linux','macos','windows'],
        'operating': ['android','linux','windows'],
        'platform':  ['hardkernel','raspberrypi'],
    }
    #mapper += ['ruby','java','dotnet']

    click.echo('{#} Mapping open-source :')

    for x in framework.keys():
        click.echo('\t[*] %s :' % x)

        shell('mkdir','-p',os.path.join(target,x))

        url = 'git@bitbucket.org:%s2use/framework.git' % x
        src = os.path.join(source,x+'2use','framework')
        dst = os.path.join(target,x,'baseline')

        if clone and not os.path.exists(src):
            shell('git','clone',url,src)

        if os.path.exists(src) and not os.path.exists(dst):
            click.echo('\t\t*) Ensuring baseline ...')

            shell('ln','-svf',src,dst)

        for y in framework[x]:
            shell('mkdir','-p',os.path.join(target,x,'framework'))

            url = 'git@bitbucket.org:%s2use/framework.git' % y
            src = os.path.join(source,y+'2use','framework')
            dst = os.path.join(target,x,'framework',y)

            if clone and not os.path.exists(src):
                shell('git','clone',url,src)

            if os.path.exists(src) and not os.path.exists(dst):
                click.echo('\t\t*) Ensuring framework : %s' % y)

                shell('ln','-svf',src,dst)

        for y in modulars.keys():
            click.echo('\t\t*) Ensuring modular : %s' % y)

            shell('mkdir','-p',os.path.join(target,x,y))

            for z in modulars[y]:
                url = 'git@bitbucket.org:%s2use/library4%s.git' % (z,x)
                src = os.path.join(source,z+'2use','library4'+x)
                dst = os.path.join(target,x,y,z)

                if clone and not os.path.exists(src):
                    shell('git','clone',url,src)

                if os.path.exists(src) and not os.path.exists(dst):
                    click.echo('\t\t\t-> %s ...' % z)

                    shell('ln','-svf',src,dst)

    click.echo('{#} Finished mapping code-source.')

################################################################################

@cli.command('repo')
@click.argument('source', nargs=1, default='/git/fossil')
@click.argument('target', nargs=1, default='/git/coding')
@click.option('--bucket','-b', type=str, help="Bit-Bucket token to use.")
@click.option('--github','-g', type=str, help="GitHub API token to use.")
@click.option('--labors','-l', type=str, help="GitLab API token to use.")
@click.pass_context
def git_repos(ctx,source,target,bucket,github,labors):
    pass

#*******************************************************************************

@cli.command('dyno')
@click.argument('token', nargs=-1, required=False)
@click.option('--clone/--no-git', default=False)
@click.option('--build/--no-run', default=False)
@click.pass_context
def heroku_apps(ctx,token,clone,build):
    import heroku3

    click.echo('{#} Preparing for Heroku API :')

    if len(token)==0:
        token = []

        for ln in open('%(HOME)s/.netrc' % os.environ).read().split('\n'):
            if 'password' in ln:
                secret = ln.replace('password','').strip()

                if secret not in token:
                    click.echo('\t*] Discovered : %s'% secret)

                    token.append(secret)

    click.echo('{#} Started on Heroku apps :')

    for key in token:
        cnx = heroku3.api.Heroku()

        cnx.authenticate(key)

        click.echo('\t*) Account : %s'% cnx.account().email)

        for app in cnx.apps():
            click.echo('\t\t-> %s'% app.name)

            pth = '/git/heroku/%s' % app.name

            if clone and not os.path.exists(pth):
                shell('git','clone',
                    'https://git.heroku.com/%s.git' % app.name,
                pth)

            if build and os.path.exists(pth):
                os.chdir(pth)

                if os.path.exists('package.json'):
                    if os.path.exists('yarn.lock'):
                        shell('yarn','install')
                    else:
                        shell('npm','install')
                elif os.path.exists('setup.py') or os.path.exists('requirements.txt'):
                    if not os.path.exists('venv'):
                        shell('virtualenv','venv')

                    if os.path.exists('requirements.txt'):
                        shell('venv/bin/pip','install','-r','requirements.txt')
                    elif os.path.exists('setup.py'):
                        shell('venv/bin/python','setup.py','build')
                elif os.path.exists('composer.json'):
                    shell('composer','install')

    click.echo('{#} Finished Heroku apps.')

#*******************************************************************************

@cli.command('help')
@click.argument('alias', nargs=-1)
@click.option('--zip/--no-zip', default=True)
@click.option('--pdf/--no-pdf', default=True)
@click.option('--epub/--no-epub', default=False)
@click.option('--web/--no-web', default=True)
@click.pass_context
def readthedocs(ctx, alias, zip, pdf, epub, web):
    click.echo('Read The Docs :')

    for entry in alias:
        label = 'stable'

        if '=' in entry:
            entry,label = entry.split('=',1)

        click.echo("\t-> %s" % entry)

        if pdf:
            shell("wget","-c",
                "https://%s.readthedocs.io/_/downloads/en/%s/pdf/" % (entry,label),
                "-O","%s/rtfd/zip/%s.pdf" % (ctx.obj['bpath'],entry)
            )

        if epub:
            shell("wget","-c",
                "https://%s.readthedocs.io/_/downloads/en/%s/epub/" % (entry,label),
                "-O","%s/rtfd/zip/%s.epub" % (ctx.obj['bpath'],entry)
            )

        if zip or web:
            shell("wget","-c",
                "https://%s.readthedocs.io/_/downloads/en/%s/htmlzip/" % (entry,label),
                "-O","%s/rtfd/zip/%s.zip" % (ctx.obj['bpath'],entry)
            )

        if web:
            os.chdir('%s/rtfd/web' % ctx.obj['bpath'])

            shell("unzip","-qo","%s/rtfd/zip/%s.zip" % (ctx.obj['bpath'],entry))

################################################################################

@cli.command('list')
@click.pass_context
def listing(ctx):
    click.echo('Listing :')

#*******************************************************************************

@cli.command('sync')
@click.pass_context
def syncing(ctx):
    click.echo('Syncing :')

#*******************************************************************************

@cli.command('make')
@click.option('--device', prompt='Your USB device', help='The device to format.', default="sdb")
@click.option('--target', prompt='Your Target DIR', help='The target for mount.', default="/mnt")
#@click.option('--count', default=1, help='Number of greetings.')
@click.pass_context
def usb_maker(ctx, device, target):
    shell("mount","/dev/%s" % device, target)

    shell("rm","-fR","%s/grub" % target)

    shell("grub-install","--boot-directory=%s" % target,"/dev/%s" % device)

    shell("umount","/dev/%s" % device)

#*******************************************************************************

@cli.command('virt')
@click.option('--memory', '-m', type=int, default=2, help='The device to format.')
@click.option('--device', '-d', type=str, default="sdb", help='The device to format.')
@click.pass_context
def virtual(ctx,memory,device):
    shell("qemu-system-x86_64",
        "-rtc","base=localtime",
        "-m","%dG" % memory,
        "-vga","std","-drive",
        "file=/dev/%s,readonly,cache=none,format=raw,if=virtio" % device,
    "-enable-kvm")

################################################################################

if __name__ == '__main__':
    cli(
        obj={},
    )
