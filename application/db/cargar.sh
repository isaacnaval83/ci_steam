#!/bin/sh

psql -U stim stim < bd.sql
psql -U stim stim < datos.sql
