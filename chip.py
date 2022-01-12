#!/usr/bin/env python3

import os,sys,json,yaml,click

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

    ctx.obj.update({
        'alias': [],
        'specs': {},
    })

    for alias in ('perso','organ','brand','agent'):
        ctx.obj['specs'][alias] = yaml.load(open(ctx.obj['rpath']('conf','yml','%s.yaml' % alias)))

        ctx.obj['alias'].append(alias)

    ctx.obj['debug'] = debug

    #click.echo(f"Debug mode is {'on' if debug else 'off'}")

################################################################################

@cli.command('setup')
@click.pass_context
def install(ctx):
    click.echo('Install :')

#*******************************************************************************

@cli.command('units')
@click.pass_context
def listing(ctx):
    click.echo('Listing :')

    for alias,specs in ctx.obj['specs'].items():
        click.echo('\t*) %s :' % alias)

        for entry in specs:
            entry['flag'] = []

            if os.path.exists("/git/heroku/%(unit)s/%(slug)s" % entry):
                entry['flag'] += ['parse']

            if os.path.exists("/git/unitar/%(unit)s/%(slug)s" % entry):
                entry['flag'] += ['react']

            click.echo('\t\t-> name: %(slug)s' % entry)
            click.echo('\t\t   text: %(name)s' % entry)
            click.echo('\t\t   flag: %(flag)s' % entry)

################################################################################

@cli.command('parse')
@click.option('--run/--dry', default=True)
@click.option('--log/--quiet', default=True)
@click.pass_context
def parse_manager(ctx,run,log):
    key = {
        'client': "4f4613dc-0623-4543-8f91-7bf15c01630c",
        'master': "7c1ba58d-7a92-4ed5-9254-a97d09983234",
        'rest_x': "b20de6f2-9dc4-4ae8-82d3-714f7c17074b",
        'secret': "6e49d063-0b8d-4d0a-9a62-454f25428bf9",
    }

    lst = []

    click.echo('Generating Parse-Server configuration ...')

    for alias,specs in ctx.obj['specs'].items():
        click.echo('\t*) %s :' % alias)

        for entry in specs:
            entry['unit'] = alias

            click.echo('\t\t-> %(slug)s : %(name)s' % entry)

            entry['link'] = 'https://%(slug)s.herokuapp.com' % entry

            item = {
                "serverURL": "%(link)s/api/parse" % entry,
                "graphQLServerURL": "%(link)s/graph/obj"% entry,
                "supportedPushLocales": ["en", "fr"],
                "appId": entry['slug'],
                "masterKey": key['master'],
                "appName": "[%(unit)s] %(name)s" % entry,
            }

            item['iconName'] = "%(unit)s/%(slug)s.png" % entry

            lst.append(item)

    with open('%(HOME)s/parse.json' % os.environ,"w+") as f:
        f.write(json.dumps({
            "apps": lst,
            "iconsFolder": "images-directory/",
        }))

    click.echo('Executing Parse-Server via Docker ...')

    if run:
        key = 'parse-gui'

        shell("docker","stop",key)

        shell("docker","rm",key)

        shell("docker","run",
            "-v","%(HOME)s/parse.json:/src/Parse-Dashboard/parse-dashboard-config.json" % os.environ,
            "-v","%(HOME)s/Images/Logos/:/src/Parse-Dashboard/images-directory/" % os.environ,
            "-p","4040:4040","--name",key,"-d","parseplatform/parse-dashboard",
        "--dev")

    if log:
        shell("docker","logs","-f",key)

#*******************************************************************************

@cli.command('react')
@click.option('--expo/--no-expo', default=False)
@click.option('--yarn/--no-yarn', default=True)
@click.option('--save/--no-save', default=False)
@click.option('--push/--no-push', default=False)
@click.option('--all/--dry', default=False)
@click.pass_context
def react_native(ctx,expo,yarn,save,push,all):
    click.echo('#) Started React-Native operations :')

    for alias,specs in ctx.obj['specs'].items():
        click.echo('\t*) %s :' % alias)

        for entry in specs:
            entry['unit'] = alias

            click.echo('\t\t-> %(slug)s : %(name)s' % entry)

            entry['path'] = os.path.join('/git/reacts',entry['unit'],entry['slug'])

            if not os.path.exists(entry['path']):
                shell('mkdir','-p',entry['path'])

            os.chdir(entry['path'])

            if (all or expo) and not os.path.exists('App.js'):
                    shell("expo","init",".","-t","blank")

            if (all or yarn) and os.path.exists('package.json'):
                shell("yarn","install")

            if (all or save or push):
                if not os.path.exists('.git'):
                    shell("git","init")

                    shell("git","remote","add","origin","git@bitbucket.org:IT-React/%(slug)s.git" % entry)

                if (all or save):
                    shell("git","add","--all")

                    shell("git","commit","-a","-m","'Summary of : %s'" % datetime.now())

                if (all or push):
                    shell("git","push","-u","origin","master")

            #entry['link'] = 'https://%(slug)s.herokuapp.com' % entry

    click.echo('#) Finished React-Native operations.')

################################################################################

if __name__ == '__main__':
    cli(
        obj={},
    )
